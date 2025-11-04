// Programs database
const programs = {
    'basic': {
        id: 'basic',
        title: 'Basic Digital Literacy',
        description: 'Learn essential computer and internet skills to navigate the digital world with confidence.',
        features: [
            'Computer fundamentals',
            'Internet basics',
            'Email & communication',
            'Microsoft Office Suite',
            'Online safety and security'
        ],
        duration: '4 weeks',
        schedule: 'Flexible online sessions',
        requirements: 'No prior experience required',
        image: 'assets/img/digital-skills/IMG-11.jpg'
    },
    'web': {
        id: 'web',
        title: 'Web Development',
        description: 'Master the skills to build responsive and interactive websites from scratch.',
        features: [
            'HTML5 & CSS3',
            'JavaScript & jQuery',
            'Responsive design',
            'Bootstrap framework',
            'Basic web hosting'
        ],
        duration: '8 weeks',
        schedule: 'Twice a week, evening sessions',
        requirements: 'Basic computer skills',
        image: 'assets/img/digital-skills/IMG-14.jpg'
    },
    'marketing': {
        id: 'marketing',
        title: 'Digital Marketing',
        description: 'Learn to create effective digital marketing strategies and campaigns.',
        features: [
            'Social media marketing',
            'SEO & content marketing',
            'Email marketing',
            'Google Analytics',
            'Online advertising (Google & Social)'
        ],
        duration: '6 weeks',
        schedule: 'Weekend classes available',
        requirements: 'Basic internet knowledge',
        image: 'assets/img/digital-skills/IMG-18.jpg'
    },
    'graphic': {
        id: 'graphic',
        title: 'Graphic Design',
        description: 'Develop professional design skills using industry-standard tools.',
        features: [
            'Adobe Photoshop',
            'Adobe Illustrator',
            'Design principles',
            'Branding & identity',
            'Print & digital design'
        ],
        duration: '8 weeks',
        schedule: 'Flexible learning options',
        requirements: 'Creativity and basic computer skills',
        image: 'assets/img/digital-skills/graphic-design.jpg'
    },
    'python': {
        id: 'python',
        title: 'Python Programming',
        description: 'Learn Python from basics to advanced programming concepts.',
        features: [
            'Python syntax and basics',
            'Data structures',
            'File handling',
            'Object-oriented programming',
            'Basic algorithms'
        ],
        duration: '10 weeks',
        schedule: 'Weekday evenings',
        requirements: 'Basic computer skills',
        image: 'assets/img/digital-skills/python.jpg'
    },
    'data': {
        id: 'data',
        title: 'Data Analysis',
        description: 'Master data analysis techniques using modern tools and methodologies.',
        features: [
            'Excel for data analysis',
            'SQL fundamentals',
            'Data visualization',
            'Introduction to Python for data',
            'Business intelligence tools'
        ],
        duration: '8 weeks',
        schedule: 'Weekend intensive',
        requirements: 'Basic computer and math skills',
        image: 'assets/img/digital-skills/data-analysis.jpg'
    }
};

// Function to get program by ID
function getProgramById(programId) {
    return programs[programId] || null;
}

// Function to handle program application
function handleProgramApplication(event) {
    event.preventDefault();
}

// Function to update program details in the application form
function updateProgramInForm(programId) {
    const programSelect = document.getElementById('program');
    if (programSelect && programId) {
        programSelect.value = programId;
        // Make the field disabled when pre-selected (readonly doesn't work on select)
        programSelect.disabled = true;
        programSelect.style.backgroundColor = '#f8f9fa';
        programSelect.style.cursor = 'not-allowed';

        // Add a hidden input to ensure the value is submitted
        let hiddenInput = document.getElementById('program-hidden');
        if (!hiddenInput) {
            hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.id = 'program-hidden';
            hiddenInput.name = 'program';
            programSelect.parentNode.appendChild(hiddenInput);
        }
        hiddenInput.value = programId;
    }
}

// Function to reset program form field
function resetProgramForm() {
    const programSelect = document.getElementById('program');
    if (programSelect) {
        programSelect.disabled = false;
        programSelect.style.backgroundColor = '';
        programSelect.style.cursor = '';
        programSelect.value = '';

        // Remove hidden input if it exists
        const hiddenInput = document.getElementById('program-hidden');
        if (hiddenInput) {
            hiddenInput.remove();
        }
    }
}

// Initialize program-related functionality
document.addEventListener('DOMContentLoaded', function () {
    // Update program details when modal is shown
    const programModal = document.getElementById('programDetailsModal');
    if (programModal) {
        programModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const programId = button.getAttribute('data-program-id');
            const program = getProgramById(programId);

            if (program) {
                const modalTitle = programModal.querySelector('.modal-title');
                const modalBody = programModal.querySelector('.modal-body');

                // Update modal content with program details
                modalTitle.textContent = program.title;

                // Generate features list
                const featuresList = program.features.map(feature =>
                    `<li><i class="fas fa-check text-success me-2"></i>${feature}</li>`
                ).join('');

                modalBody.innerHTML = `
                    <div class="program-details">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="detail-item">
                                        <h3>Program Overview</h3>
                                        <p>${program.description}</p>
                                        <p><strong>Duration:</strong> ${program.duration}</p>
                                        <p><strong>Schedule:</strong> ${program.schedule}</p>
                                        <p><strong>Requirements:</strong> ${program.requirements}</p>
                                    </div>
                                    
                                    <div class="detail-item">
                                        <h3>What You'll Learn</h3>
                                        <ul class="list-unstyled">
                                            ${featuresList}
                                        </ul>
                                    </div>
                                    
                                    <div class="text-center mt-4">
                                        <button class="btn btn-primary btn-lg" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#applyModal"
                                                data-program-id="${program.id}">
                                            Apply Now
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            }
        });
    }

    // Handle application form submission
    const applicationForm = document.getElementById('trainingApplicationForm');
    if (applicationForm) {
        applicationForm.addEventListener('submit', handleProgramApplication);
    }

    // Update program in application form when Apply Now is clicked
    document.addEventListener('click', function (event) {
        if (event.target.hasAttribute('data-program-id')) {
            const programId = event.target.getAttribute('data-program-id');
            updateProgramInForm(programId);
        }
    });

    // Update program in application form when modal is shown
    const applyModal = document.getElementById('applyModal');
    if (applyModal) {
        applyModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            if (button.hasAttribute('data-program-id')) {
                const programId = button.getAttribute('data-program-id');
                updateProgramInForm(programId);
            }
        });

        // Reset form when modal is hidden
        applyModal.addEventListener('hidden.bs.modal', function () {
            resetProgramForm();
            const form = document.getElementById('trainingApplicationForm');
            if (form) {
                form.reset();
            }
        });
    }
});
