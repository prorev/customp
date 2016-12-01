(function() {
    tinymce.PluginManager.add('20161201', function( editor, url ) {
        editor.addButton( '20161201', {
        	text: 'Hello World',
            title: 'My test button',
            icon: false,
            onclick: function() {
                editor.insertContent('Hello World!');
            }
        });
    });
})();