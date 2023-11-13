<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <title>Portfolio</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <link rel="stylesheet" type="text/css" href="CSS/style2.css">

</head>

<body>

    <header class="header">
        <div class="header__inner">
            <a href="index.php"><div class="header__logo">My Portfolio</div></a>
            <nav class="header__navigation">
                <a href="index.php#top" class="home">Home</a>
                <a href="index.php#part" class="work">Work</a>
                <a href="index.php#part2" class="aboud">Aboud</a>
            </nav>
        </div>
    </header>

<section id="about" class="s-about target-section">

    <?php if(isset($_GET['page'])) {

    $page = $_GET['page'];
    }
    ?>
    <div class="row">
        <div class="column large-11 tab-12 s-about__content">

            <?php
        class Data{
            private $name;
            private $email;
            private $phone;
            private $message;


            function __construct() {
            }

            static function Form(){
                ?>

            <form action="index2.php" method="POST">


                        <div class="container">
                            <div class="row">
                                <h1>Contact me</h1>
                            </div>
                            <div class="row">
                            </div>
                            <div class="row input-container">
                                <div class="col-xs-12">
                                    <div class="styled-input wide">
                                        <input type="text" name="user_name" required />
                                        <label>Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="styled-input wide">
                                        <input type="email" name="user_mail" required />
                                        <label>Email</label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="styled-input wide" >
                                        <input type="number" name="user_phone" required />
                                        <label>Phone Number</label>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="styled-input wide">
                                        <textarea name="user_message" required></textarea>
                                        <label>Message</label>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <a href="#popup1">
                                    <button type="submit" class="btn-lrg submit-btn">Send Message</button>
                                    </a>
                                </div>
                            </div>
                        </div>

            </form>
        <?php
            }

            static function validate($data)
            {
                $errorMsg = '';

                $name = htmlspecialchars($data['user_name']);
                $email = $data['user_mail'];
                $phone = $data['user_phone'];
                $message = $data['user_message'];

                if(trim($name) == '') {
                    $errorMsg = 'Будь ласка, вкажіть своє ім\'я!';
                }
                else if(trim($email) == '') {
                    $errorMsg .= 'Будь ласка, введіть ваш email!';
                } else if(trim($phone) == '') {
                    $errorMsg .= 'Будь ласка, введіть ваш номер телефону!';
                } else if(trim($message) == '') {
                    $errorMsg .= 'Будь ласка, введіть ваше повідомлення!';
                }

                return $errorMsg;

            }



            static function Out(){
                $name = $_POST['user_name'];
                $email = $_POST['user_mail'];
                $phone = $_POST['user_phone'];
                $message = $_POST['user_message'];
                ?>

       <div class="formOkMsg">
        <h1>Отримали такі дані:</h1>
          <div><p>Ваше ім'я: <?php echo $name; ?></div>
           <div><p>Ваше email: <?php echo $email; ?></div>
           <div><p>Ваш телефон: <?php echo $phone; ?></div>
           <div><p>Ваше повідомлення: <?php echo $message; ?></div>
           <a class="ashka" href="index2.php">Back</a>
        </div>
        <?php }

        }
            Data::Form();

            if (!empty($_POST['user_name'])) {
                $fom = new Data();
                $fom = Data::validate($_POST);

                if(empty($fom)) {
                    $fom = Data::Out();
                }
            }
            ?>

    </div>
    </div>

</section>


</body>

</html>