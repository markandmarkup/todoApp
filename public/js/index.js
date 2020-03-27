const deleteButtons = document.querySelectorAll('.deleteToDo');

deleteButtons.forEach((deleteButton)=>{
    deleteButton.addEventListener('click', (e)=>{
        deleteRequest(e.target.dataset.id);
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
