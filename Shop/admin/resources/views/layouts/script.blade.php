   <script>
       $.ajaxSetup({
           headers: {
               "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
           },
       });
       // Global ajax setup

       $('.select2bs5').select2({});
   </script>
   {{-- <script>
       function deleteFormPrevent() {
           $(".delete-item").on("submit", function(e) {
               if (!confirm("Are you sure you want to Delete?")) {
                   e.preventDefault();
               }
           });
       }

       $(document).ready(function() {
           deleteFormPrevent();
       });
   </script> --}}

   <script>
       tinymce.init({
           selector: "textarea.tinymce",
           license_key: "gpl",
           plugins: "preview importcss searchreplace autolink autosave directionality code visualblocks visualchars fullscreen image link media codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount charmap quickbars emoticons accordion",
           editimage_cors_hosts: ["picsum.photos"],
           menubar: "edit view insert format tools table ",
           toolbar: "undo redo | bold italic superscript subscript underline strikethrough blocks fontsizeinput fontfamily align numlist bullist | link image | forecolor backcolor removeformat | table media | lineheight outdent indent| charmap emoticons | code fullscreen preview | codesample",
           autosave_ask_before_unload: true,
           autosave_interval: "10s",
           autosave_prefix: "{path}{query}-{id}-",
           autosave_restore_when_empty: false,
           autosave_retention: "2m",
           image_advtab: true,
           image_class_list: [{
                   title: "Default",
                   value: "default-img",
               },
               {
                   title: "Cube Style",
                   value: "cube-img",
               },
               {
                   title: "Peralax Style",
                   value: "peralax-img",
               },
               {
                   title: "Sun Flower Style",
                   value: "sun-flower-img",
               },
               {
                   title: "round Flower Style",
                   value: "round-flower-img",
               },
           ],

           importcss_append: true,
           image_title: true,
           automatic_uploads: true,
           images_upload_url: "{{ route('editor.upload') }}",
           file_picker_types: "image",
           file_picker_callback: (cb, value, meta) => {

               var input = document.createElement("input");
               input.setAttribute("type", "file");
               input.setAttribute("accept", "image/*");

               input.onchange = function() {
                   var file = this.files[0];
                   var reader = new FileReader();

                   reader.onload = function() {
                       var id = "blobid" + new Date().getTime();
                       var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                       var base64 = reader.result.split(",")[1];
                       var blobInfo = blobCache.create(id, file, base64);
                       blobCache.add(blobInfo);

                       // Call the callback to populate the Title field with the file name
                       cb(blobInfo.blobUri(), {
                           title: file.name
                       });
                   };
                   reader.readAsDataURL(file);
               };
               input.click();
           },
           // Image upload handler
           images_upload_handler: (blobInfo, progress) => {
               return new Promise((resolve, reject) => {

                   var formData = new FormData();
                   formData.append('file', blobInfo.blob(), blobInfo.filename());

                   fetch("{{ route('editor.upload') }}", {
                           method: 'POST',
                           headers: {
                               'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                   .getAttribute('content'),
                           },
                           body: formData
                       })
                       .then(response => {
                           if (!response.ok) {
                               reject('HTTP Error: ' + response.status);
                               return;
                           }
                           return response.json();
                       })
                       .then(json => {

                           if (!json || typeof json.location !== 'string') {
                               reject('Invalid JSON response');
                               return;
                           }

                           resolve(json.location); // image URL

                       })
                       .catch(error => {
                           reject('Image upload failed: ' + error.message);
                       });

               });
           },
           height: 600,
           highlight_on_focus: false,
           image_caption: true,
           quickbars_selection_toolbar: "bold italic | fontsizeinput | forecolor backcolor quicklink charmap emoticons h2 h3 align image quicktable",
           noneditable_class: "mceNonEditable",
           toolbar_mode: "wrap",
           contextmenu: "align link removeformat image table",
           skin: 'oxide-dark',
           content_css: 'dark',
           content_style: "body { font-family:Helvetica,Arial,sans-serif; font-size:16px }",
       });
       // text Editor settings
   </script>
