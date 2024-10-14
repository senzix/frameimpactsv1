<?php
require_once __DIR__ . '/vendor/autoload.php';

// Include PHPMailer classes at the top of your file
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $full_name = $_POST['full_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $education = $_POST['education'];
    $sales_experience = $_POST['sales_experience'];
    $skills = $_POST['skills'];
    $languages = isset($_POST['language']) ? implode(", ", $_POST['language']) : '';
    $local_dialects = $_POST['local_dialects'];
    $flexible_hours = $_POST['flexible_hours'];
    $why_paper_plus = $_POST['why_paper_plus'];

    // Generate PDF
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'Job Application Form Submission', 0, 1, 'C');
    $pdf->Ln(10);

    // Function to add a labeled field with aligned colon
    function addField($pdf, $label, $value) {
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(50, 8, $label, 0);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(5, 8, ':', 0);
        $pdf->MultiCell(0, 8, $value, 0);
    }

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, 'Personal Information', 0, 1);
    addField($pdf, 'Full Name', $full_name);
    addField($pdf, 'Phone', $phone);
    addField($pdf, 'Email', $email);

    $pdf->Ln(5);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, 'Education & Qualifications', 0, 1);
    addField($pdf, 'Highest Education', $education);

    $pdf->Ln(5);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, 'Work Experience & Skills', 0, 1);
    addField($pdf, 'Sales Experience', $sales_experience);
    addField($pdf, 'Skills', $skills);

    $pdf->Ln(5);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, 'Language Proficiency', 0, 1);
    addField($pdf, 'Languages', $languages);
    addField($pdf, 'Local Dialects', $local_dialects);

    $pdf->Ln(5);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, 'Availability & Commitment', 0, 1);
    addField($pdf, 'Flexible Hours', $flexible_hours);

    $pdf->Ln(5);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, 'Additional Information', 0, 1);
    addField($pdf, 'Why Paper Plus', $why_paper_plus);

    $pdfContent = $pdf->Output('S');

    // Send email with PDF attachment
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'frameimpacts@gmail.com'; // Your Gmail address
        $mail->Password   = 'dacs myqu mghh orqt'; // Your app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom('applications@frameimpacts.com', 'Frame Impacts Applications');
        $mail->addReplyTo('info@frameimpacts.com', 'Frame Impacts Applications');
        $mail->addAddress('paperplus47@gmail.com', 'Recipient Name');

        // Additional headers to hide personal information
        $mail->Sender = 'applications@frameimpacts.com';
        $mail->addCustomHeader('X-Sender', 'applications@frameimpacts.com');
        $mail->addCustomHeader('X-Mailer', 'PHP/' . phpversion());

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Job Application Submission';
        $mail->Body    = 'Please find the attached PDF with the job application details and the applicant\'s resume.';

        // Attach PDF
        $mail->addStringAttachment($pdfContent, 'job_application.pdf');

        // Handle resume file upload
        if (isset($_FILES['resume']) && $_FILES['resume']['error'] == UPLOAD_ERR_OK) {
            $mail->addAttachment($_FILES['resume']['tmp_name'], $_FILES['resume']['name']);
        } else {
            $mail->Body .= '<br><br>Note: No resume was attached to this application.';
        }

        if ($mail->send()) {
            echo json_encode(['status' => 'success', 'message' => 'Application submitted successfully!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo]);
        }
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Error submitting application. Please try again.']);
    }
    exit;
}
?>
