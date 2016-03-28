function sendForm(form, formType) {
    switch (formType) {
        case 'bugForm':
            var message = 'Merci! Votre bug à été transmis. \n Nous vous remercions de votre aide!';
            break;
        case 'commentForm':
            var message = 'Merci! Votre message à été envoyé. \n Nous prenons vos commentaires à coeur!';
            break;
        case 'questionForm':
        case 'contactForm':
            var message = 'Merci! Votre question à été envoyée. \n Nous vous répondrons sous peu!';
            break;
    }
    swal({
        title: 'Merci!',
        text: message,
        type: 'success',
        confirmButtonText: 'Ok',
    },
		function () {
		    var link = 'postForm.php?page=' + form.page.value + '&type=' + form.type.value;
		    form.method = 'POST';
		    form.action = link;
		    form.submit();
	});
}

function errorForm(message, formInput) {
    swal({
        title: 'Oops...',
        text: message,
        type: 'error',
        confirmButtonText: 'Ok',
    }, function() {
        formInput.focus();
    });
}

function validationForm(formName)
{
    var formToSubmit = document.getElementById(formName);
    formToSubmit.envoyer.blur();
    //bug-média
    if (formToSubmit.media !== undefined && formToSubmit.media.value == '')
        errorForm('Veuillez choisir le média que vous utilisez!', formToSubmit.media);
    //bug-navigateur
    else if (formToSubmit.navigateur !== undefined && formToSubmit.navigateur.value == '')
        errorForm('Veuillez indiquer quel navigateur vous utilisez!', formToSubmit.navigateur);
    //bug-description
    else if (formToSubmit.bugDesc !== undefined && formToSubmit.bugDesc.value == '')
        errorForm('Veuillez inscrire une description du bug!', formToSubmit.bugDesc);
    //commentaire-commentaire
    else if (formToSubmit.commentaire !== undefined && formToSubmit.commentaire.value == '')
        errorForm('Votre commentaire est manquant!', formToSubmit.commentaire);
    //question-email
    else if (formToSubmit.email !== undefined && formToSubmit.email.value == '')
        errorForm('Votre email est manquant!', formToSubmit.email);
    //question-question
    else if (formToSubmit.question !== undefined && formToSubmit.question.value == '')
        errorForm('Vous devez inscrire votre question!', formToSubmit.email);
    //send
    else sendForm(formToSubmit, formName);
}