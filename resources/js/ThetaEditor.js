// Allow image file to to be uploaded and previewed
// and form content (textarea), to be edit
// using a customized rich text editor.
class ThetaEditor {
    // Enable editing on iframe/textarea fields
    enableEditMode() {
        richTextEditor.document.designMode = "On";
    }

    // Perform a given command.
    // Exp. turn text into bold or italic
    performCommand(command) {
        richTextEditor.document.execCommand(command, false, null);
    }

    // Perform a given command using argument(s)
    // Exp. turn text into bold or italic
    performCommandWithArg(command, arg) {
        richTextEditor.document.execCommand(command, false, arg);
    }

    // Pass text content from iframe
    // to textarea element
    submitFormData(iframe, textarea) {
        let iframeContent = iframe.contentWindow.document.body.innerHTML;
        textarea.innerHTML = iframeContent;
    }

    // Insert data into iframe element
    editForm(iframe, textArea) {
        iframe.contentWindow.document.body.innerHTML = textArea.innerHTML;
    }
}

export default ThetaEditor;
