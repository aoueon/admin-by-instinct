// #### HIDE / SHOW TOOLBAR
// Add class by default
document.querySelector('html').classList.add('has-wpadminbar-hidden');
// Click T while on the front-end to quickly hide/show the WP Admin Bar
document.addEventListener('keydown', function(event) {
    if ( event.which === 84 && (!document.activeElement || document.activeElement == document.body ) ) {
        document.querySelector('html').classList.toggle('has-wpadminbar-hidden');
    }
});