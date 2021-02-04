import suneditor from 'suneditor';
import fr from 'suneditor/src/lang/fr'
import plugins from 'suneditor/src/plugins';
import CodeMirror from 'codemirror'
import 'codemirror/mode/htmlmixed/htmlmixed'

let caretPlugin = {
    name: 'caretReturn',
    display: 'command',
    title: 'Retour chariot',
    buttonClass: 'se-btn',
    innerHTML: '<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M14 2H9.46156V0H16V13.5H8.00002L9.38464 14.0769L8.61541 15.9231L0.400024 12.5L8.61541 9.07692L9.38464 10.9231L8.00002 11.5H14V2Z" fill="black"/></svg>',
    add: function (core, targetElement) {
        const context = core.context;
        const caretTag = core.util.createElement('br')
        context.caretReturn = {
            targetButton: targetElement,
            tag: caretTag
        }
    },
    active: function (element) {
        if (!element) {
            this.util.removeClass(this.context.caretReturn.targetButton, 'active');
        } else if (/^br$/i.test(element.nodeName)) {
            this.util.addClass(this.context.caretReturn.targetButton, 'active');
            return true;
        }
        return false;
    },
    action: function () {
        if (!this.util.hasClass(this.context.caretReturn.targetButton, 'active')) {
            const newNode = this.util.createElement('br');
            this.nodeChange(newNode, [], null, null);
        } else {
            this.nodeChange(null, [], ['br'], true);
        }
    }
}

let nbspPlugin = {
    name: 'nonbreakingSpace',
    display: 'command',
    title: 'Espace insécable',
    buttonClass: 'se-btn',
    innerHTML: '<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><rect y="3" width="2" height="11" fill="black"/><rect x="14" y="3" width="2" height="11" fill="black"/><path fill-rule="evenodd" clip-rule="evenodd" d="M9.64254 -0.0144958L10 1L11.3575 1.0145L8.91311 5.08851L10.9309 6.0974L8.36267 10.2066L9.86267 11.2066L7.5 15L6.00003 15.5L5.99998 14L7.13739 11.7934L5.63739 10.7934L8.06916 6.9026L6.08694 5.91149L9.64254 -0.0144958Z" fill="black"/></svg>',
    add: function (core, targetElement) {
        const context = core.context;
        context.nonbreakingSpace = {
            targetButton: targetElement,
        }
    },
    action: function () {
        if (!this.util.hasClass(this.context.caretReturn.targetButton, 'active')) {
            const newText = this.util.createTextNode('&nbsp;');
            console.log(newText)
            // this.nodeChange(newText, [], null, null);
        } else {
            // this.nodeChange(null, [], [], true);
        }
    }
}

let markPlugin = {
    name: 'mark',
    display: 'command',
    title:'Surligner',
    buttonClass: 'se-btn',
    innerHTML:`<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill="black" d="M19.3,20H0.9C0.4,20,0,19.6,0,19.1s0.4-0.9,0.9-0.9h18.3c0.5,0,0.9,0.4,0.9,0.9C20,19.6,19.7,20,19.3,20z"/><path fill="black" d="M1.2,18.2c-0.4,0-0.7-0.3-0.8-0.7c-0.1-0.3,0-0.6,0.2-0.8l3-3l-0.3-0.3c-0.4-0.4-0.4-0.9-0.1-1.2l1-1.4 c0-0.4,0.1-1,0.6-1.3l9.5-9C14.5,0.2,14.9,0,15.4,0c0.5,0,1.1,0.2,1.4,0.5l2.6,2.6C19.8,3.5,20,3.9,20,4.4c0,0.5-0.3,1-0.7,1.3 l-9,9.5c-0.3,0.3-0.8,0.5-1.2,0.6L7.8,17c-0.2,0.2-0.4,0.2-0.5,0.2c-0.2,0-0.5-0.2-0.6-0.3l-0.3-0.3l-1.4,1.4 c-0.1,0.1-0.4,0.3-0.6,0.3L1.2,18.2z M3.3,16.3l0.7,0L5,15.2l-0.4-0.4L3.3,16.3z M5.9,10.8l3.3,3.3c0,0,0,0,0.1,0l9-9.6 c0,0,0,0,0,0c0,0,0-0.1,0.1-0.1c0,0,0,0,0,0l-2.6-2.6c-0.1-0.1-0.1-0.1-0.1-0.1s0,0-0.1,0.1L5.9,10.8z"/></svg>`,

    add: function (core, targetElement) {
        const context = core.context;
        context.mark = {
            targetButton: targetElement
        };
    },
    active: function (element) {
        if (!element) {
            this.util.removeClass(this.context.mark.targetButton, 'active');
        } else if (/^mark$/i.test(element.nodeName) && element.style.backgroundColor.length > 0) {
            this.util.addClass(this.context.mark.targetButton, 'active');
            return true;
        }

        return false;
    },
    action: function () {
        if (!this.util.hasClass(this.context.mark.targetButton, 'active')) {
            const newNode = this.util.createElement('MARK');
            newNode.style.backgroundColor = 'hsl(60,75%,60%)';
            this.nodeChange(newNode, ['background-color'], null, null);
        } else {
            this.nodeChange(null, ['background-color'], ['mark'], true);
        }
    }
}

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

// TODO : class attribute on link, add display empty folder when no image in imageGallery
const editor = suneditor.create('editor', {
    width: '100%',
    height: 'auto',
    lang: fr,
    charCounterLabel: 'Total des Caractères :',
    charCounter : true,
    plugins: {...plugins, caretPlugin, nbspPlugin, markPlugin},
    addTagsWhitelist: 'mark',
    formats: siteStyleFormat,
    codeMirror: codeMirrorOptions,
    imageUploadHeader: {'X-CSRF-TOKEN':csrfToken.content},
    imageUploadUrl: '/admin/image/upload',
    imageGalleryUrl: '/admin/gallery',
    imageUrlInput: true,
    buttonList: [
        ['removeFormat'],
        ['formatBlock', 'fontColor', 'fontSize'],
        ['bold', 'underline', 'italic', 'strike', 'subscript', 'superscript', 'nonbreakingSpace', 'caretReturn', 'mark'],
        '/', // Line break
        ['outdent', 'indent'],
        ['align', 'horizontalRule', 'list', 'table'],
        ['link', 'image', 'imageGallery', 'video'],
        ['showBlocks', 'codeView']
    ],

});

editor.onChange = (contents, core) => {
    editor.save();
}

