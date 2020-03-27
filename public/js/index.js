const deleteButtons = document.querySelectorAll('.deleteToDo');
const completeButtons = document.querySelectorAll('.completeToDo');

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
    })
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
