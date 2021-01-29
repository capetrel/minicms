import suneditor from 'suneditor';
import lang from 'suneditor/src/lang';
import plugins from 'suneditor/src/plugins';
import CodeMirror from 'codemirror'
import 'codemirror/mode/htmlmixed/htmlmixed'

let csrfToken = document.querySelector('meta[name="csrf-token"]');

const codeMirrorOptions = {
    src: CodeMirror,
    options: {
        mode: "htmlmixed",
        htmlmode: true,
        lineNumbers: true
    }
};

const siteStyleFormat = [
    'p', 'div', 'blockquote', 'h2', 'h3', 'h4', 'h5', 'h6'
]

suneditor.create('editor', {
    width: '100%',
    height: 'auto',
    lang: lang.fr,
    charCounterLabel: 'Total des Caractères :',
    charCounter : true,
    plugins: plugins,
    formats: siteStyleFormat,
    codeMirror: codeMirrorOptions,
    imageUploadHeader: {'X-CSRF-TOKEN':csrfToken.content},
    // imageUploadUrl: '/admin/image/upload',
    imageGalleryUrl: '/img/editor/images',
    buttonList: [
        ['removeFormat'],
        ['formatBlock'],
        ['fontColor', 'fontSize'],
        ['bold', 'underline', 'italic', 'strike', 'subscript', 'superscript'],
        '/', // Line break
        ['outdent', 'indent'],
        ['align', 'horizontalRule', 'list', 'table'],
        ['link', 'image', 'imageGallery', 'video'],
        ['showBlocks', 'codeView']
    ],

})
