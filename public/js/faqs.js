

function handleClickEvent(event) {
    if (event.target.getAttribute('id') == null) {
        return;
    }
    event.preventDefault();
    var open_elements = document.querySelectorAll(".show");
    var element = document.getElementById(event.target.getAttribute('id'));
    var node = element.parentElement.children[1];
    for (var idx = 0; idx < open_elements.length; idx++) {
        checkIfAncestorElement(open_elements[idx], node);
    }
    if (node.classList.contains("show")) {
        hideElement(node);
    } else if (node.classList.contains("hide")) {
        showElement(node);
    }
}

if (document.addEventListener) {
    document.addEventListener('click', handleClickEvent, false);
} else {
    document.attachEvent('onclick', handleClickEvent);
}

function checkIfAncestorElement(element, node) {
    if (!element.contains(node)) {
        hideElement(element);
    }
}

function showElement(element) {
    element.classList.remove("hide");
    element.classList.add("show");
}

function hideElement(element) {
    element.classList.remove("show");
    element.classList.add("hide");
}
