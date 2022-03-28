window.onload = () => {
    document.forms.search_form.onsubmit = search_form_onsubmit;
}

function search_form_onsubmit(event){
    event.preventDefault();
}