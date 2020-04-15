const deleteButtons = document.querySelectorAll('.deleteToDo');
const completeButtons = document.querySelectorAll('.completeToDo');
const editButtons = document.querySelectorAll('.toggleEdit');
const editForms = document.querySelectorAll('.editForm');

deleteButtons.forEach((deleteButton)=>{
    deleteButton.addEventListener('click', (e)=>{
        deleteRequest(e.target.dataset.id);
    });
});

completeButtons.forEach((completeButton)=>{
    completeButton.addEventListener('click', (e)=>{
        completeRequest(e.target.dataset.id);
    });
});

editButtons.forEach((editButton)=>{
    editButton.addEventListener('click', (e)=>{
        editButton.parentElement.style = "display: none;";
        editButton.parentElement.nextElementSibling.style = "display: block;";
    });
});

editForms.forEach((editForm)=>{
    editForm.addEventListener('submit', (e)=>{
        e.preventDefault();
        let editTitleInput = e.target.firstElementChild.value;
        let id = e.target.firstElementChild.dataset.id;
        editRequest(id, editTitleInput);
    });
});

async function deleteRequest(toDoId) {
    let data = JSON.stringify({"id":toDoId})
    fetch('/', {
        method: 'DELETE',
        body: data,
        headers: {
            "Content-Type": "application/json"
        }
    }).then((response) => {
        if (response.status === 200) {
            window.location.reload(true);
        } else {
            console.log(response.status);
        }
    });
}

async function completeRequest(toDoId) {
    fetch('/' + toDoId + '/complete', {
        method: 'PUT',
        headers: {
            "Content-Type": "text/plain"
        }
    }).then((response) => {
        if (response.status === 200) {
            window.location.reload(true);
        } else {
            console.log(response.status);
        }
    })
}

async function editRequest(toDoId, editTitleInput) {
    let data = JSON.stringify({
        "id":toDoId,
        "editTitleInput":editTitleInput
    })
    fetch('/' + toDoId, {
        method: 'PUT',
        body: data,
        headers: {
            "Content-Type": "application/json"
        }
    }).then((response) => {
        if (response.status === 200) {
            window.location.reload(true);
        } else {
            console.log(response.status);
        }
    })
}
