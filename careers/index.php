<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paper Plus - Job Application</title>
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


        h2 {
            text-align: center;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: auto;
            padding: 20px;
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

        .banner {
            width: 100%;
            height: auto;
            background: url('img/hiring.png') no-repeat center center/cover;
            text-align: center;
            color: #ffffff;
        }

        .banner h2 {
            margin: 0;
            padding: 70px 0;
            background: rgba(0, 0, 0, 0.6);
        }

        .content-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-top: 20px;
        }

        .job-details {
            flex: 1;
            margin-right: 20px;
        }

        .job-details h2 {
            color: #e8491d;
            margin-top: 20px;
            text-align: left;
        }

        .job-details ul {
            padding-left: 20px;
        }

        .job-details li {
            margin-bottom: 10px;
        }

        .image-spot {
            flex: 0 0 400px;
            margin-top: 2rem;
        }

        .image-spot img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .apply-now-container {
            text-align: center;
            margin-top: 30px;
        }

        .apply-now-button {
            display: inline-block;
            padding: 15px 30px;
            background-color: #e8491d;
            color: #ffffff;
            text-decoration: none;
            font-size: 18px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .apply-now-button:hover {
            background-color: #333333;
        }

        @media (max-width: 768px) {
            .content-wrapper {
                flex-direction: column;
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

            .job-details,
            .image-spot {
                width: 100%;
                margin-right: 0;
            }

            .image-spot {
                order: -1;
                /* This moves the image to the top */
                margin-top: 0;
            }
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

    <div class="container">
        <h2>Join Our Team</h2>
        <div class="content-wrapper">
            <div class="job-details">
                <h2>About Us:</h2>
                <p>We are a leading stationery store in Lamka, offering a wide range of office and school supplies in both wholesale and retail. We pride ourselves on delivering excellent products and services to our customers, and we are looking for a dedicated Sales Associate to join our team.</p>
                <h2>Job Responsibilities:</h2>
                <ul>
                    <li>Sales and Customer Support: Conduct field sales by visiting clients and promoting products, while also assisting customers in-store with inquiries, managing inventory, and processing transactions.</li>
                    <li>Customer Relations: Build and maintain strong relationships with customers through excellent service.</li>
                    <li>Store Organization: Help restock and organize the store for an optimal shopping experience.</li>
                    <li>Promotional Strategies: Work with management to implement promotional strategies and achieve sales targets.</li>
                    <li>Sales Documentation: Keep accurate records of sales and transactions.</li>
                    <li>Transportation: Use a two-wheeler or four-wheeler for field sales and deliveries as needed.</li>
                </ul>
                <h2>Requirements:</h2>
                <ul>
                    <li>Proficiency in English, Hindi, and local dialects.</li>
                    <li>Valid driving license for both two-wheeler and four-wheeler vehicles.</li>
                    <li>Strong communication and interpersonal skills to effectively engage with customers and colleagues.</li>
                    <li>Ability to multi-task and manage time efficiently in a dynamic environment.</li>
                    <li>Previous sales experience is an advantage but not mandatory; training will be provided.</li>
                </ul>
            </div>
            <div class="image-spot">
                <img src="hiring.png" alt="We're Hiring">
            </div>
        </div>

        <div class="apply-now-container">
            <a href="application_form" class="apply-now-button">Apply Now</a>
        </div>
    </div>

</body>

</html> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paper Plus - Job Application</title>
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


        h2 {
            text-align: center;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: auto;
            padding: 20px;
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

        .banner {
            width: 100%;
            height: auto;
            background: url('img/hiring.png') no-repeat center center/cover;
            text-align: center;
            color: #ffffff;
        }

        .banner h2 {
            margin: 0;
            padding: 70px 0;
            background: rgba(0, 0, 0, 0.6);
        }

        .content-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-top: 20px;
        }

        .job-details {
            flex: 1;
            margin-right: 20px;
        }

        .job-details h2 {
            color: #e8491d;
            margin-top: 20px;
            text-align: left;
        }

        .job-details ul {
            padding-left: 20px;
        }

        .job-details li {
            margin-bottom: 10px;
        }

        .image-spot {
            flex: 0 0 400px;
            margin-top: 2rem;
        }

        .image-spot img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .apply-now-container {
            text-align: center;
            margin-top: 30px;
        }

        .apply-now-button {
            display: inline-block;
            padding: 15px 30px;
            background-color: #e8491d;
            color: #ffffff;
            text-decoration: none;
            font-size: 18px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .apply-now-button:hover {
            background-color: #333333;
        }

        @media (max-width: 768px) {
            .content-wrapper {
                flex-direction: column;
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

            .job-details,
            .image-spot {
                width: 100%;
                margin-right: 0;
            }

            .image-spot {
                order: -1;
                /* This moves the image to the top */
                margin-top: 0;
            }
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

    <div class="container">
        <h2>Job Application Period Closed</h2>
        <div class="content-wrapper">
            <div class="job-details">
                <p>Thank you for your interest in joining our team. Unfortunately, the application period for this position has ended. We appreciate your enthusiasm and encourage you to check back in the future for new opportunities.</p>
                
                <h2>About Us:</h2>
                <p>We are a leading stationery store in Lamka, offering a wide range of office and school supplies in both wholesale and retail. We pride ourselves on delivering excellent products and services to our customers.</p>
                
                <h2>Future Opportunities:</h2>
                <p>While we're not currently accepting applications, we're always on the lookout for talented individuals to join our team. Keep an eye on this page for future job openings.</p>
            </div>
        </div>

        <div class="apply-now-container">
            <a href="#" class="apply-now-button disabled">Application Closed</a>
        </div>
    </div>

</body>

</html>
