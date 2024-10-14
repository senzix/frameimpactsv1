<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paper Plus - Job Application Form</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');
        @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css');

        body {
            font-family: 'Roboto', sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 90%;
            max-width: 800px;
            margin: auto;
            overflow: hidden;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        header {
            background: linear-gradient(to right, #2c3e50, #3498db);
            color: #ffffff;
            padding: 20px 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .containerheader {
            width: 90%;
            max-width: 1200px;
            margin: auto;
            padding: 0 20px;
        }

        .header-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            width: 80px;
            height: auto;
        }

        .header-text {
            text-align: left;
        }

        header h1 {
            margin: 0;
            font-size: 2.5em;
            font-weight: 700;
            color: #ffffff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .tagline {
            margin: 5px 0 0;
            font-size: 1em;
            color: #ecf0f1;
        }

        .contact-info {
            display: flex;
            align-items: center;
        }

        .phone-link {
            display: flex;
            align-items: center;
            color: #ffffff;
            text-decoration: none;
            font-size: 1.1em;
            transition: color 0.3s ease;
        }

        .phone-link:hover {
            color: #f39c12;
        }

        .phone-link i {
            margin-right: 10px;
            font-size: 1.2em;
        }

        h2 {
            color: #35424a;
            text-align: center;
            margin-bottom: 30px;
        }

        .form-section {
            margin-bottom: 30px;
        }

        .form-section h3 {
            color: #e8491d;
            border-bottom: 2px solid #e8491d;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="date"],
        select,
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
        }

        textarea {
            height: 100px;
            resize: vertical;
        }

        .radio-group {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .radio-group label {
            display: inline;
            font-weight: normal;
        }

        input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #e8491d;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #333333;
        }

        @media (max-width: 768px) {
            .container {
                width: 95%;
                padding: 10px;
            }

            input[type="text"],
            input[type="email"],
            input[type="tel"],
            input[type="date"],
            select,
            textarea {
                font-size: 14px;
            }

            .header-content {
                flex-direction: column;
                text-align: center;
            }

            .logo {
                margin-bottom: 10px;
            }

            .header-text,
            .contact-info {
                margin-top: 10px;
            }

            .radio-group {
                flex-direction: column;
                gap: 5px;
            }
        }

        .toast {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            padding: 15px 20px;
            border-radius: 4px;
            color: white;
            font-weight: bold;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
            z-index: 1000;
        }

        .toast.success {
            background-color: #4CAF50;
        }

        .toast.error {
            background-color: #f44336;
        }

        .spinner {
            display: none;
            width: 40px;
            height: 40px;
            margin: 20px auto;
            border: 4px solid #f3f3f3;
            border-top: 4px solid #3498db;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .processing-message {
            display: none;
            text-align: center;
            font-weight: bold;
            margin-top: 10px;
        }

        .header-link {
            color: inherit;
            text-decoration: none;
        }

        .header-link:hover {
            text-decoration: none;
            color: inherit;
        }

        .home-button-container {
            text-align: center;
            margin: 20px 0;
        }

        .home-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #35424a;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .home-button:hover {
            background-color: #e8491d;
        }
    </style>
</head>

<body>
    <header>
        <div class="containerheader">
            <div class="header-content">
                <img src="paper.jpg" alt="Paper Plus Logo" class="logo">
                <div class="header-text">
                    <h1>PAPER PLUS</h1>
                    <p class="tagline">Your One-Stop Stationery Shop</p>
                </div>
                <div class="contact-info">
                    <a href="tel:7628907100" class="phone-link">
                        <i class="fas fa-phone"></i>
                        <span>7628907100</span>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <div class="home-button-container">
        <a href="/" class="home-button">Home</a>
    </div>
    <div id="toast" class="toast"></div>
    <div class="container">
        <h2>Job Application Form</h2>
        <form id="applicationForm" action="process_form" method="post" enctype="multipart/form-data">
            <div class="form-section">
                <h3>Position Information</h3>
                <div class="form-group">
                    <label>Position Applied For: Sales Associate</label>
                </div>
                <div class="form-group">
                    <label>Location: Paper Plus - Opposite Hotel Venus, New Lamka</label>
                </div>
            </div>

            <div class="form-section">
                <h3>Personal Information</h3>
                <div class="form-group">
                    <label for="full_name">Full Name (as per official ID):</label>
                    <input type="text" id="full_name" name="full_name" required>
                </div>
                <div class="form-group">
                    <label for="phone">Contact Number:</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address:</label>
                    <input type="email" id="email" name="email" required>
                </div>
            </div>

            <div class="form-section">
                <h3>Education & Qualifications</h3>
                <div class="form-group">
                    <label for="education">Highest Level of Education Completed:</label>
                    <select id="education" name="education" required>
                        <option value="">Select</option>
                        <option value="High School Diploma">High School Diploma</option>
                        <option value="Associate Degree">Associate Degree</option>
                        <option value="Bachelor's Degree">Bachelor's Degree</option>
                        <option value="Master's Degree">Master's Degree</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>

            <div class="form-section">
                <h3>Work Experience & Skills</h3>
                <div class="form-group">
                    <label>Do you have previous experience in sales or retail?</label>
                    <div class="radio-group">
                        <label><input type="radio" name="sales_experience" value="Yes" required> Yes</label>
                        <label><input type="radio" name="sales_experience" value="No" required> No</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="skills">What specific skills or qualities do you bring that make you suitable for this role? *</label>
                    <textarea id="skills" name="skills" required></textarea>
                </div>
            </div>

            <div class="form-section">
                <h3>Language Proficiency</h3>
                <div class="form-group">
                    <label>Can you communicate fluently in the following languages? (Check all that apply) *</label>
                    <div>
                        <label><input type="checkbox" name="language[]" value="English"> English</label>
                        <label><input type="checkbox" name="language[]" value="Hindi"> Hindi</label>
                        <label><input type="checkbox" name="language[]" value="Local Dialects"> Local Dialects (Please specify)</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="local_dialects">If you speak local dialects, please specify:</label>
                    <input type="text" id="local_dialects" name="local_dialects">
                </div>
            </div>

            <div class="form-section">
                <h3>Availability & Commitment</h3>
                <div class="form-group">
                    <label>Are you available to work flexible hours, including weekends? *</label>
                    <div class="radio-group">
                        <label><input type="radio" name="flexible_hours" value="Yes" required> Yes</label>
                        <label><input type="radio" name="flexible_hours" value="No" required> No</label>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h3>Additional Information</h3>
                <div class="form-group">
                    <label for="why_paper_plus">Why do you want to work at Paper Plus Stationery? *</label>
                    <textarea id="why_paper_plus" name="why_paper_plus" required></textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="resume">Upload Resume (PDF, DOC, or DOCX): *</label>
                <input type="file" id="resume" name="resume" accept=".pdf,.doc,.docx" required>
            </div>

            <div class="spinner" id="loadingSpinner"></div>
            <div class="processing-message" id="processingMessage">Submitting application, please wait...</div>

            <input type="submit" value="Submit">
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function showToast(message, type) {
            const toast = document.getElementById('toast');
            toast.textContent = message;
            toast.className = `toast ${type}`;
            toast.style.opacity = 1;

            setTimeout(() => {
                toast.style.opacity = 0;
            }, 3000);
        }

        $(document).ready(function() {
            $('#applicationForm').on('submit', function(e) {
                e.preventDefault();
                var formData = new FormData(this);

                // Disable submit button, show loading spinner and message
                $('input[type="submit"]').prop('disabled', true);
                $('#loadingSpinner').show();
                $('#processingMessage').show();

                $.ajax({
                    url: 'process_form.php',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        try {
                            var result = JSON.parse(response);
                            showToast(result.message, result.status);
                            if (result.status === 'success') {
                                $('#applicationForm')[0].reset();
                            }
                        } catch (e) {
                            showToast('An error occurred. Please try again.', 'error');
                        }
                    },
                    error: function() {
                        showToast('An error occurred. Please try again.', 'error');
                    },
                    complete: function() {
                        // Re-enable submit button, hide loading spinner and message
                        $('input[type="submit"]').prop('disabled', false);
                        $('#loadingSpinner').hide();
                        $('#processingMessage').hide();
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            });
        });
    </script>
</body>

</html>