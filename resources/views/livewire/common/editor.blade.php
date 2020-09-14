<div wire:ignore>
    <textarea id="editor" class="mb-4 opacity-0"></textarea>
</div>

@push('scripts')
    <script data-turbolinks-track="reload">
        document.addEventListener("turbolinks:load", function() {
            const debounce = (func, delay) => { 
                let debounceTimer 
                return function() { 
                    const context = this
                    const args = arguments 
                    clearTimeout(debounceTimer) 
                    debounceTimer = setTimeout(() => func.apply(context, args), delay) 
                } 
            }

            tinymce.remove();
            tinymce.init({
                selector: '#editor',
                plugins: 'preview paste importcss searchreplace directionality visualblocks visualchars fullscreen link table charmap hr pagebreak nonbreaking toc insertdatetime advlist lists wordcount textpattern noneditable charmap quickbars emoticons',
                menubar: 'edit view insert format tools table help',
                toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen | link anchor',
                toolbar_sticky: false,
                importcss_append: true,
                template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
                template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
                height: 600,
                quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quicktable',
                quickbars_insert_toolbar: 'quicktable | quicklink emoticons',
                noneditable_noneditable_class: 'mceNonEditable',
                toolbar_mode: 'sliding',
                contextmenu: 'link table',
                content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
                resize: false,
                branding: false,
                setup : function(ed) {
                    ed.on('input', debounce(function(e) {
                        @this.set('data', ed.getContent({format: 'html'}))
                    }, 250));
                },
            });
        })
    </script>
@endpush
