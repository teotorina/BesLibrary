window.onload = (event : Event) => {
    document.forms["search_form"].onsubmit = (event: Event) => search_form_onsubmit(event);
}

function search_form_onsubmit(event: Event): void{
    event.preventDefault();
}