$(document).ready(function() {
    var element = document.querySelector('.js-multi-select');
    var choices = new Choices(element, {
        removeItemButton: true,
        searchResultLimit: 5,
        renderChoiceLimit: -1,
    });
});
