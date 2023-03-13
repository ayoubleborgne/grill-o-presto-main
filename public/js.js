function ConfirmCreateMeal($mealname) {

    let response = confirm("Êtes-vous certain de vouloir créer ce nouveau repas ?");
    if (response)
        return true;
    else
        return false;
}

function ConfirmDeleteMeal($mealname) {

    let response = confirm("Êtes-vous certain de vouloir supprimer " + $mealname + " ?");
    if (response)
        return true;
    else
        return false;
}

function ConfirmUpdateMeal($mealname) {

    let response = confirm("Êtes-vous certain de vouloir modifier " + $mealname + " ?");
    if (response)
        return true;
    else
        return false;
}
$(document).ready(function () {
    $('.form-select m-2 ajout').select2();
});
$(document).ready(function () {
    $('.basic-single').select2();
});

$(document).ready(function () {
    $('.mealRepas').select2();
});