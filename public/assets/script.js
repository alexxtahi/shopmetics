/*------------------
    CountDown
--------------------*/
// For demo preview
var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();

if (mm == 12) {
    mm = '01';
    yyyy = yyyy + 1;
} else {
    mm = parseInt(mm) + 1;
    mm = String(mm).padStart(2, '0');
}
var timerdate = mm + '/' + dd + '/' + yyyy;
// For demo preview end

console.log(timerdate);


// Use this for real timer date
/* var timerdate = "2020/01/01"; */

$("#countdown").countdown(timerdate, function (event) {
    $(this).html(event.strftime("<div class='cd-item'><span>%D</span> <p>Jours</p> </div>" + "<div class='cd-item'><span>%H</span> <p>Hrs</p> </div>" + "<div class='cd-item'><span>%M</span> <p>Mins</p> </div>" + "<div class='cd-item'><span>%S</span> <p>Secs</p> </div>"));
});

function triProdByPrix() {
    //var filter = $('#sorting');
    alert('Filtre par prix');
}

$('#sorting').change(function name(params) {
    alert('Filtre par prix');
});

/**
 * Lancer l'impression des vues pour générer des états
 */
function imprimeEtat() {
    // Lancer l'impression
    window.print();
    window.onafterprint = window.close;
}


/**
 * Lancer la modification d'une catégorie
 */
function launchCatEdit(lib_cat) {
    // Indexation des balises
    var editForm = document.getElementById('edit-form');
    var oldLibCat = document.getElementById('old_lib');
    var newLibCat = document.getElementById('new_lib');
    var validateBtn = document.getElementById('validate-btn');
    var eraseBtn = document.getElementById('erase-btn');
    // Modification des propriétés
    newLibCat.disabled = false;
    validateBtn.disabled = false;
    eraseBtn.disabled = false;
    // Remplissage des champs
    oldLibCat.value = lib_cat;
    newLibCat.value = lib_cat;
    editForm.action = editForm.action.replace('%7Blib_cat%7D', lib_cat);
    // Redirection vers le formulaire
    window.location = window.location.href.replace('#main-content', '') + '#main-content';
}

function disableEditFields() {
    // Indexation des balises
    var editForm = document.getElementById('edit-form');
    var oldLib = document.getElementById('old_lib');
    var newLib = document.getElementById('new_lib');
    var validateBtn = document.getElementById('validate-btn');
    var eraseBtn = document.getElementById('erase-btn');
    var editFormUrl = document.getElementById('edit-form-url');
    // Modification des propriétés
    newLib.disabled = true;
    validateBtn.disabled = true;
    eraseBtn.disabled = true;
    // Remplissage des champs
    oldLib.value = '';
    newLib.value = '';
    editForm.action = editFormUrl.value;
}

/**
 * Lancer la modification d'un moyen de paiement
 */
function launchMoyPayEdit(lib_moyen_paiement) {
    // Indexation des balises
    var editForm = document.getElementById('edit-form');
    var oldLibMoyPay = document.getElementById('old_lib');
    var newLibMoyPay = document.getElementById('new_lib');
    var validateBtn = document.getElementById('validate-btn');
    var eraseBtn = document.getElementById('erase-btn');
    // Modification des propriétés
    newLibMoyPay.disabled = false;
    validateBtn.disabled = false;
    eraseBtn.disabled = false;
    // Remplissage des champs
    oldLibMoyPay.value = lib_moyen_paiement;
    newLibMoyPay.value = lib_moyen_paiement;
    editForm.action = editForm.action.replace('%7Blib_moyen_paiement%7D', lib_moyen_paiement);
    // Redirection vers le formulaire
    window.location = window.location.href.replace('#main-content', '') + '#main-content';
}
