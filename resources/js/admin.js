require('./bootstrap');

const deleteForm = document.querySelectorAll('.delete-post-form');

deleteForm.forEach(element => {
    element.addEventListener('submit', function(e){
        const alertMessage= confirm('Are you sure you want to delete the post?');
        if (!alertMessage) {
            e.preventDefault();
        }
    })
});