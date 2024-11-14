
    document.querySelectorAll('.favorite-icon').forEach(icon => {
        icon.addEventListener('click', function() {
            const jobId = this.dataset.id;
            const heartIcon = this.querySelector('i');
            
            fetch(`/jobs/${jobId}/favorite`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    heartIcon.classList.toggle('fas');
                    heartIcon.classList.toggle('far');
                }
            });
        });
    });
    