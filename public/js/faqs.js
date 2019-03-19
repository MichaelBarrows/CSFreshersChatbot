/**
 * FAQ's application JavaScript
 *
 * The code in this file is used to:
 * * show elements
 * * hide elements
 * * ensure ancestor elements are not hidden when a child is clicked
 *
 * @author Michael Barrows <contact@michaelbarrows.co.uk>
 */

/**
 * handleClickEvent()
 *
 * This function handles the click events for all of the list elements on the
 * page
 *
 * @param event event  Element that triggered the event.
 */
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

// Checks if event listener exists, and attaches an event if it doesn't.
if (document.addEventListener) {
    document.addEventListener('click', handleClickEvent, false);
} else {
    document.attachEvent('onclick', handleClickEvent);
}

/**
 * checkIfAncestorElement()
 *
 * This function checks if the element is an ancestor element to the node, and
 * hides the element if it isn't, so that when one element opens, all others
 * close, with the exception of ancestors.
 *
 * @param node element  Potential ancestor node
 * @param node node     Child node
 */
function checkIfAncestorElement(element, node) {
    if (!element.contains(node)) {
        hideElement(element);
    }
}

/**
 * showElement()
 *
 * Shows a hidden element.
 *
 * @param node element  Element to be shown
 */
function showElement(element) {
    element.classList.remove("hide");
    element.classList.add("show");
}

/**
 * hideElement()
 *
 * Hides a visible element.
 *
 * @param node element  Element to be hidden
 */
function hideElement(element) {
    element.classList.remove("show");
    element.classList.add("hide");
}
