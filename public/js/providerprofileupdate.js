document.addEventListener("DOMContentLoaded", function() {
    document.getElementById('add-service').addEventListener('click', function() {
        let container = document.getElementById('service-type-container');
        let div = document.createElement('div');
        div.classList.add('service-input');
        div.innerHTML = `
            <input type="text" name="service_type[]" placeholder="Enter service type">
            <button type="button" class="remove-service">Remove</button>
        `;
        container.appendChild(div);
    });

    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('remove-service')) {
            event.target.parentElement.remove();
        }
    });
});
