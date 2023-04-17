/*!
    FileReader.js - v0.9
    A lightweight wrapper for common FileReader usage.
    Copyright 2012 Brian Grinstead - MIT License.
    See http://github.com/bgrins/filereader.js for documentation.
*/

(function(window, document) {

    var FileReader = window.FileReader;
    var FileReaderSyncSupport = false;
    var workerScript = "self.addEventListener('message', function(e) { var data=e.data; try { var reader = new FileReaderSync; postMessage({ result: reader[data.readAs](data.file), extra: data.extra, file: data.file})} catch(e){ postMessage({ result:'error', extra:data.extra, file:data.file}); } }, false);";
    var syncDetectionScript = "self.addEventListener('message', function(e) { postMessage(!!FileReaderSync); }, false);";
    var fileReaderEvents = ['loadstart', 'progress', 'load', 'abort', 'error', 'loadend'];

    var FileReaderJS = window.FileReaderJS = {
        enabled: false,
        setupInput: setupInput,
        setupDrop: setupDrop,
        setupClipboard: setupClipboard,
        sync: false,
        output: [],
        opts: {
            dragClass: "drag",
            accept: false,
            readAsDefault: 'BinaryString',
            readAsMap: {
                'image/*': 'DataURL',
                'text/*' : 'Text'
            },
            on: {
                loadstart: noop,
                progress: noop,
                load: noop,
                abort: noop,
                error: noop,
                loadend: noop,
                skip: noop,
                groupstart: noop,
                groupend: noop,
                beforestart: noop
            }
        }
    };

    // Setup jQuery plugin (if available)
    if (typeof(jQuery) !== "undefined") {
        jQuery.fn.fileReaderJS = function(opts) {
            return this.each(function() {
                if ($(this).is("input")) {
                    setupInput(this, opts);
                }
                else {
                    setupDrop(this, opts);
                }
            });
        };

        jQuery.fn.fileClipboard = function(opts) {
            return this.each(function() {
                setupClipboard(this, opts);
            });
        };
    }

    // Not all browsers support the FileReader interface.  Return with the enabled bit = false.
    if (!FileReader) {
        return;
    }

    // WorkerHelper is a little wrapper for generating web workers from strings
    var WorkerHelper = (function() {

        var URL = window.URL || window.webkitURL;
        var BlobBuilder = window.BlobBuilder || window.WebKitBlobBuilder || window.MozBlobBuilder;

        // May need to get just the URL in case it is needed for things beyond just creating a worker.
        function getURL (script) {
            if (window.Worker && BlobBuilder && URL) {
                var bb = new BlobBuilder();
                bb.append(script);
                return URL.createObjectURL(bb.getBlob());
            }

            return null;
        }

        // If there is no need to revoke a URL later, or do anything fancy then just return the worker.
        function getWorker (script, onmessage) {
            var url = getURL(script);
            if (url) {
                var worker = new Worker(url);
                worker.onmessage = onmessage;
                return worker;
            }

            return null;
        }

        return {
            getURL: getURL,
            getWorker: getWorker
        };

    })();

    // setupClipboard: bind to clipboard events (intended for document.body)
    function setupClipboard(element, opts) {

        if (!FileReaderJS.enabled) {
            return;
        }
        var instanceOptions = extend(extend({}, FileReaderJS.opts), opts);

        element.addEventListener("paste", onpaste, false);

        function onpaste(e) {
            var files = [];
            var clipboardData = e.clipboardData || {};
            var items = clipboardData.items || [];

            for (var i = 0; i < items.length; i++) {
                var file = items[i].getAsFile();

                if (file) {

                    // Create a fake file name for images from clipboard, since this data doesn't get sent
                    var matches = new RegExp("/\(.*\)").exec(file.type);
                    if (!file.name && matches) {
                        var extension = matches[1];
                        file.name = "clipboard" + i + "." + extension;
                    }

                    files.push(file);
                }
            }

            if (files.length) {
                processFileList(e, files, instanceOptions);
                e.preventDefault();
                e.stopPropagation();
            }
        }
    }

    // setupInput: bind the 'change' event to an input[type=file]
    function setupInput(input, opts) {

        if (!FileReaderJS.enabled) {
            return;
        }
        var instanceOptions = extend(extend({}, FileReaderJS.opts), opts);

        input.addEventListener("change", inputChange, false);
        input.addEventListener("drop", inputDrop, false);

        function inputChange(e) {
            processFileList(e, input.files, instanceOptions);
        }

        function inputDrop(e) {
            e.stopPropagation();
            e.preventDefault();
            processFileList(e, e.dataTransfer.files, instanceOptions);
        }
    }

    // setupDrop: bind the 'drop' event for a DOM element
    function setupDrop(dropbox, opts) {

        if (!FileReaderJS.enabled) {
            return;
        }
        var instanceOptions = extend(extend({}, FileReaderJS.opts), opts);
        var dragClass = instanceOptions.dragClass;
        var initializedOnBody = false;
		if(dropbox!=null){
        // Bind drag events to the dropbox to add the class while dragging, and accept the drop data transfer.
        dropbox.addEventListener("dragenter", onlyWithFiles(dragenter), false);
        dropbox.addEventListener("dragleave", onlyWithFiles(dragleave), false);
        dropbox.addEventListener("dragover", onlyWithFiles(dragover), false);
        dropbox.addEventListener("drop", onlyWithFiles(drop), false);
		}

        // Bind to body to prevent the dropbox events from firing when it was initialized on the page.
        document.body.addEventListener("dragstart", bodydragstart, true);
        document.body.addEventListener("dragend", bodydragend, true);
        document.body.addEventListener("drop", bodydrop, false);

        function bodydragend(e) {
            initializedOnBody = false;
        }

        function bodydragstart(e) {
            initializedOnBody = true;
        }

        function bodydrop(e) {
            if (e.dataTransfer.files && e.dataTransfer.files.length ){
                e.stopPropagation();
                e.preventDefault();
            }
        }

        function onlyWithFiles(fn) {
            return function() {
                if (!initializedOnBody) {
                    fn.apply(this, arguments);
                }
            };
        }

        function drop(e) {
            e.stopPropagation();
            e.preventDefault();
            if (dragClass) {
                removeClass(dropbox, dragClass);
            }
            processFileList(e, e.dataTransfer.files, instanceOptions);
        }

        function dragenter(e) {
            e.stopPropagation();
            e.preventDefault();
            if (dragClass) {
                addClass(dropbox, dragClass);
            }
        }

        function dragleave(e) {
            if (dragClass) {
                removeClass(dropbox, dragClass);
            }
        }

        function dragover(e) {
            e.stopPropagation();
            e.preventDefault();
            if (dragClass) {
                addClass(dropbox, dragClass);
            }
        }
    }

    // setupCustomFileProperties: modify the file object with extra properties
    function setupCustomFileProperties(files, groupID) {
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            file.extra = {
                nameNoExtension: file.name.substring(0, file.name.lastIndexOf('.')),
                extension: file.name.substring(file.name.lastIndexOf('.') + 1),
                fileID: i,
                uniqueID: getUniqueID(),
                groupID: groupID,
                prettySize: prettySize(file.size)
            };
        }
    }

    // getReadAsMethod: return method name for 'readAs*' - http://www.w3.org/TR/FileAPI/#reading-a-file
    function getReadAsMethod(type, readAsMap, readAsDefault) {
        for (var r in readAsMap) {
            if (type.match(new RegExp(r))) {
                return 'readAs' + readAsMap[r];
            }
        }
        return 'readAs' + readAsDefault;
    }

    // processFileList: read the files with FileReader, send off custom events.
    function processFileList(e, files, opts) {

        var filesLeft = files.length;
        var group = {
            groupID: getGroupID(),
            files: files,
            started: new Date()
        };

        function groupEnd() {
            group.ended = new Date();
            opts.on.groupend(group);
        }

        function groupFileDone() {
            if (--filesLeft === 0) {
                groupEnd();
            }
        }

        FileReaderJS.output.push(group);
        setupCustomFileProperties(files, group.groupID);

        opts.on.groupstart(group);

        // No files in group - end immediately
        if (!files.length) {
            groupEnd();
            return;
        }

        var sync = FileReaderJS.sync && FileReaderSyncSupport;
        var syncWorker;

        // Only initialize the synchronous worker if the option is enabled - to prevent the overhead
        if (sync) {
            syncWorker = WorkerHelper.getWorker(workerScript, function(e) {
                var file = e.data.file;
                var result = e.data.result;

                // Workers seem to lose the custom property on the file object.
                if (!file.extra) {
                    file.extra = e.data.extra;
                }

                file.extra.ended = new Date();

                // Call error or load event depending on success of the read from the worker.
                opts.on[result === "error" ? "error" : "load"]({ target: { result: result } }, file);
                groupFileDone();

            });
        }

        Array.prototype.forEach.call(files, function(file) {

            file.extra.started = new Date();

            if (opts.accept && !file.type.match(new RegExp(opts.accept))) {
                opts.on.skip(file);
                groupFileDone();
                return;
            }

            if (opts.on.beforestart(file) === false) {
                opts.on.skip(file);
                groupFileDone();
                return;
            }

            var readAs = getReadAsMethod(file.type, opts.readAsMap, opts.readAsDefault);

            if (sync && syncWorker) {
                syncWorker.postMessage({
                    file: file,
                    extra: file.extra,
                    readAs: readAs
                });
            }
            else {

                var reader = new FileReader();
                reader.originalEvent = e;

                fileReaderEvents.forEach(function(eventName) {
                    reader['on' + eventName] = function(e) {
                        if (eventName == 'load' || eventName == 'error') {
                            file.extra.ended = new Date();
                        }
                        opts.on[eventName](e, file);
                        if (eventName == 'loadend') {
                            groupFileDone();
                        }
                    };
                });

                reader[readAs](file);
            }
        });
    }

    // checkFileReaderSyncSupport: Create a temporary worker and see if FileReaderSync exists
    function checkFileReaderSyncSupport() {
        var worker = WorkerHelper.getWorker(syncDetectionScript, function(e) {
            FileReaderSyncSupport = e.data;
        });

        if (worker) {
            worker.postMessage({});
        }
    }

    // noop: do nothing
    function noop() {

    }

    // extend: used to make deep copies of options object
    function extend(destination, source) {
        for (var property in source) {
            if (source[property] && source[property].constructor &&
                source[property].constructor === Object) {
                destination[property] = destination[property] || {};
                arguments.callee(destination[property], source[property]);
            }
            else {
                destination[property] = source[property];
            }
        }
        return destination;
    }

    // hasClass: does an element have the css class?
    function hasClass(el, name) {
        return new RegExp("(?:^|\\s+)" + name + "(?:\\s+|$)").test(el.className);
    }

    // addClass: add the css class for the element.
    function addClass(el, name) {
        if (!hasClass(el, name)) {
          el.className = el.className ? [el.className, name].join(' ') : name;
        }
    }

    // removeClass: remove the css class from the element.
    function removeClass(el, name) {
        if (hasClass(el, name)) {
          var c = el.className;
          el.className = c.replace(new RegExp("(?:^|\\s+)" + name + "(?:\\s+|$)", "g"), " ").replace(/^\s\s*/, '').replace(/\s\s*$/, '');
        }
    }

    // prettySize: convert bytes to a more readable string.
    function prettySize(bytes) {
        var s = ['bytes', 'kb', 'MB', 'GB', 'TB', 'PB'];
        var e = Math.floor(Math.log(bytes)/Math.log(1024));
        return (bytes/Math.pow(1024, Math.floor(e))).toFixed(2)+" "+s[e];
    }

    // getGroupID: generate a unique int ID for groups.
    var getGroupID = (function(id) {
        return function() {
            return id++;
        };
    })(0);

    // getUniqueID: generate a unique int ID for files
    var getUniqueID = (function(id) {
        return function() {
            return id++;
        };
    })(0);

    // The interface is supported, bind the FileReaderJS callbacks
    FileReaderJS.enabled = true;

})(this, document);
//CUSTOM ALI
$(document).ready(function(){	
	var dropbox;  

var oprand = {
	dragClass : "active",
    on: {
        load: function(e, file) {
			// check file type
			var imageType = /image.*/;
			if (!file.type.match(imageType)) {  
			  alert("File \""+file.name+"\" is not a valid image file");
			  return false;	
			} 
			
			// check file size
			if (parseInt(file.size / 1024) > 2050) {  
			  alert("File \""+file.name+"\" is too big.Max allowed size is 2 MB.");
			  return false;	
			} 

			create_box(e,file);
    	},
    }
};

	//FileReaderJS.setupDrop(document.getElementById('dropbox'), oprand); 
	FileReaderJS.setupDrop(document.getElementById('dropbox1'), oprand);
	$("#imgInp1").change(function() {
        readURL(this,"imgInp1");
    });
	FileReaderJS.setupDrop(document.getElementById('dropbox2'), oprand);
	$("#imgInp2").change(function() {
        readURL(this,"imgInp2");
    });
	FileReaderJS.setupDrop(document.getElementById('dropbox3'), oprand);
	$("#imgInp3").change(function() {
        readURL(this,"imgInp3");
    });
	FileReaderJS.setupDrop(document.getElementById('dropbox4'), oprand);
	$("#imgInp4").change(function() {
        readURL(this,"imgInp4");
    });
});
function readURL(input,imgInp) {
	var rand = Math.floor((Math.random()*100000)+3);
	if (input.files && input.files[0]) {
        var reader = new FileReader();
        var src;
        var cover;
        reader.onload = function(e) { 
			src =  e.target.result;
			var file = $('#'+imgInp)[0].files[0];
			var imgName = file.name;
			var textId = $('#'+imgInp).parent().find('.row .drop-here-text').attr('id');
			$('#'+textId).hide();
		var set_cover = '';
		if (imgInp == "imgInp1") {
			set_cover += '<td class="set-cover"><a href="javascript:void(0);">Feature it</a></td>';
		} else if( imgInp == "imgInp4"){
			set_cover += '<td class="set-cover"><a href="javascript:void(0);">Feature it</a></td>';
			} else {
			set_cover += '';
			}
			var template =	'<tr id="'+rand+'" class="image_row new_upload">'+
				'<td class="table-img"><img src="'+src+'" class="media_url new_media" alt="" data-cover="0"></td>'+
				'<td class="table-img-name">'+imgName+'</td>'+ set_cover
				+
				'<td class="table-progress-bar"><div class="progress">'+
				'<div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div></div></td>'+
				'<td class="table-close-icon"><a href="javascript:void(0);" class="remove_media" data-media="'+rand+'"><span class="fa fa-times"></span></a></td>'+
			'</tr>';
		//var template = '<div class="eachImage" id="'+rand+'">';
		//template += '<span class="preview" id="'+rand+'"><img src="'+src+'"><span class="overlay"><span class="updone"></span></span>';
		//template += '</span>';
		//template += '<div class="progress" id="'+rand+'"><span></span></div>';
//			if($( "#"+imgInp).siblings( ".row").find('.dropbox tr').html() == null){	
			var dropbox = $( "#"+imgInp).siblings(".row").find('.dropbox').attr('id');
			if($("#"+dropbox+" tr").html() == null){
				$("#"+dropbox).html(template);
				$("#"+dropbox+" .set-cover").addClass('');
				$("#"+dropbox+" .cover_image a").text('Feature it');
				$("#"+dropbox+" .media_url").attr('data-cover','0');
			} else {
				
				$("#"+dropbox).append(template);
			}
		}
        reader.readAsDataURL(input.files[0]);
        
    }
    
}
create_box = function(e,file){
	var rand = Math.floor((Math.random()*100000)+3);
	var imgName = file.name; // not used, Irand just in case if user wanrand to print it.
	var src		= e.target.result;
	$('.drop-here-text').hide();
		var set_cover = '';
		if (imgInp == "imgInp1") {
			set_cover += '<td class="set-cover"><a href="javascript:void(0);">Feature it</a></td>';
		} else if( imgInp == "imgInp4"){
			set_cover += '<td class="set-cover"><a href="javascript:void(0);">Feature it</a></td>';
			} else {
			set_cover += '';
			}
	var template =	'<tr id="'+rand+'" class="image_row new_upload">'+
			'<td class="table-img"><img src="'+src+'" class="media_url new_media" alt="" data-cover="0"></td>'+
			'<td class="table-img-name">'+imgName+'</td>'+ set_cover
			+
			'<td class="table-progress-bar"><div class="progress">'+
			'<div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div></div></td>'+
			'<td class="table-close-icon"><a href="javascript:void(0);" class="remove_media" data-media="'+rand+'"><span class="fa fa-times"></span></a></td>'+
		'</tr>';
	//var template = '<div class="eachImage" id="'+rand+'">';
	//template += '<span class="preview" id="'+rand+'"><img src="'+src+'"><span class="overlay"><span class="updone"></span></span>';
	//template += '</span>';
	//template += '<div class="progress" id="'+rand+'"><span></span></div>';

	if($(".dropbox tr").html() == null){
		var dropbox = $(".dropbox").attr('id');
		$("#"+dropbox).html(template);
		$("#"+dropbox+' .set-cover').addClass('');
		$("#"+dropbox+' .cover_image a').text('Feature it');
		$("#"+dropbox+' .media_url').attr('data-cover','0');
	} else { 
		var dropbox = $(".dropbox").attr('id');
		$("#"+dropbox).append(template);
	}
	
	// upload image
	//upload(file,rand);
	
}

upload = function(file,rand){
	// now upload the file
	var xhr = new Array();
	xhr[rand] = new XMLHttpRequest();
	xhr[rand].open("post", "ajax_fileupload.php", true);

	xhr[rand].upload.addEventListener("progress", function (event) {
		console.log(event);
		if (event.lengthComputable) {
			$(".progress[id='"+rand+"'] span").css("width",(event.loaded / event.total) * 100 + "%");
			$(".preview[id='"+rand+"'] .updone").html(((event.loaded / event.total) * 100).toFixed(2)+"%");
		}
		else {
			alert("Failed to compute file upload length");
		}
	}, false);

	xhr[rand].onreadystatechange = function (oEvent) {  
	  if (xhr[rand].readyState === 4) {  
		if (xhr[rand].status === 200) {  
		  $(".progress[id='"+rand+"'] span").css("width","100%");
		  $(".preview[id='"+rand+"']").find(".updone").html("100%");
		  $(".preview[id='"+rand+"'] .overlay").css("display","none");
		} else {  
		  alert("Error : Unexpected error while uploading file");  
		}  
	  }  
	};  
	
	// Set headers
	xhr[rand].setRequestHeader("Content-Type", "multipart/form-data");
	xhr[rand].setRequestHeader("X-File-Name", file.fileName);
	xhr[rand].setRequestHeader("X-File-Size", file.fileSize);
	xhr[rand].setRequestHeader("X-File-Type", file.type);

	// Send the file (doh)
	xhr[rand].send(file);
}
