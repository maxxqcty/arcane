document.addEventListener('DOMContentLoaded', function() {

  const customerCards = document.querySelectorAll('.customer-card');
    const searchInput = document.getElementById('customerSearch');
    const statusFilter = document.getElementById('statusFilter');
    const membershipFilter = document.getElementById('membershipFilter');
    const noCustomersMessage = document.getElementById('noCustomersMessage');
    
    // Function to filter the customer cards
    const filterCustomers = () => {
        const searchTerm = searchInput.value.toLowerCase().trim();
        const statusValue = statusFilter.value;
        const membershipValue = membershipFilter.value;
        let visibleCount = 0;

        customerCards.forEach(card => {
            const name = card.getAttribute('data-name');
            const code = card.getAttribute('data-code');
            const status = card.getAttribute('data-status');
            const membership = card.getAttribute('data-membership');

            // 1. Search filter (Name or Code)
            const matchesSearch = name.includes(searchTerm) || code.includes(searchTerm);

            // 2. Status filter
            const matchesStatus = (statusValue === 'all' || status === statusValue);

            // 3. Membership filter
            const matchesMembership = (membershipValue === 'all' || membership === membershipValue);

            // Combine all filters
            if (matchesSearch && matchesStatus && matchesMembership) {
                card.style.display = 'block';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        // Show/hide "No customers found" message
        if (noCustomersMessage) {
            noCustomersMessage.style.display = (visibleCount === 0) ? 'block' : 'none';
        }
    };

    // Attach event listeners
    searchInput.addEventListener('input', filterCustomers);
    statusFilter.addEventListener('change', filterCustomers);
    membershipFilter.addEventListener('change', filterCustomers);


    // Define all modal types (Edit and Show)
    const modals = [
    {
        buttons: document.querySelectorAll('.open-new-modal'),
        modal: document.getElementById('newModal'),
        content: document.getElementById('newModalContent'),
        urlAttr: 'data-new-url',
        errorMsg: 'Error loading new customer form.'
    },
    {
        buttons: document.querySelectorAll('.open-edit-modal'),
        modal: document.getElementById('editModal'),
        content: document.getElementById('editModalContent'),
        urlAttr: 'data-edit-url',
        errorMsg: 'Error loading edit form.'
    },
    {
        buttons: document.querySelectorAll('.open-show-modal'),
        modal: document.getElementById('showModal'),
        content: document.getElementById('showModalContent'),
        urlAttr: 'data-show-url',
        errorMsg: 'Error loading details.'
    }
];


    modals.forEach(({ buttons, modal, content, urlAttr, errorMsg }) => {
        if (!modal || !content || !buttons.length) return; // Skip if not found

        buttons.forEach(btn => {
            btn.addEventListener('click', async () => {
                const url = btn.getAttribute(urlAttr);
                modal.classList.remove('hidden');
                content.innerHTML = '<div class="text-center py-10 text-gray-400">Loading...</div>';

                try {
                    const response = await fetch(url);
                    const html = await response.text();
                    content.innerHTML = html;

                    // Close modal when clicking close button
                    const closeBtn = content.querySelector('.close-modal');
                    if (closeBtn) {
                        closeBtn.addEventListener('click', () => modal.classList.add('hidden'));
                    }
                } catch (error) {
                    content.innerHTML = `<div class="text-center text-red-400 py-10">${errorMsg}</div>`;
                }
            });
        });
    });
});


