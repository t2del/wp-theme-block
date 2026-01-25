<?php

$ehs_page = get_permalink(12508).'#ehs';
$book_apt = get_permalink(3614);
$title = "Find a Package";




$question1 = get_field('question_1', 'option');
$questioncode1 = get_field('question_code_1', 'option');
//$option1   = array( 
//                array("id" => 1, "option" => "Female"),
//                array("id" => 2, "option" => "Male") 
//            );
$option1 = get_field('option_1', 'option');
$notice1   = get_field('notice_1', 'option');

$question2 = get_field('question_2', 'option');
$questioncode2 = get_field('question_code_2', 'option');
// $option2   = array( 
//                 array("id" => 3, "option" => "18 to 29"),
//                 array("id" => 4, "option" => "30 to 39"),
//                 array("id" => 5, "option" => "40 to 49"),
//                 array("id" => 6, "option" => "50 and above")                
//             );
$option2 = get_field('option_2', 'option');
$notice2   = get_field('notice_2', 'option');
$notice_2_a   = get_field('notice_2_a', 'option');
$notice_2_b   = get_field('notice_2_b', 'option');

$question3 = "Do you have any family history of chronic diseases (ie: Hypertension/Diabetes/High cholesterol)";
$option3   = array( 
                array("id" => 7, "option" => "Yes"),
                array("id" => 8, "option" => "No") 
            );
$notice3   = "";

$question4 = get_field('question_4', 'option');
$questioncode4 = get_field('question_code_4', 'option');
// $option4   = array( 
//                 array("id" => 9, "option" => "Yes"),
//                 array("id" => 10, "option" => "No") 
//             );
$option4    = get_field('option_4', 'option');
$notice4   = get_field('notice_4', 'option');


$package_premium = array(
    "age"       => "18 to 29",
    "name"      => "LF Premium",
    "details"   => "Live Fuller Premium is a screening for lifestyle diseases. A diagnosis made at an early age can prevent serious illness in the future. This package is tailored towards young adults. It provides an understanding of an individual's health condition to avoid common health risks."
);
$package_gold = array(
    "age"       => "30 to 39",
    "name"      => "LF Gold",
    "details"   => "Live Fuller Gold tailors to your agegreoup and lifestyle where early detection is fundamental. Early detection can improve the quality of health and life. It is recommended to determine the health risks that may develop over time including chronic diseases - high blood pressure, high cholesterol and diabetes. 
    For ladies, a choice of Ultrasound Breast or Ultrasound Pelvis is available and a choice of Ultrasound Prostate or Treadmill test for the men.
    "
);
$package_sapphire = array(
    "age"       => "40 to 49",
    "name"      => "LF Sapphire",
    "details"   => "Live Fuller Sapphire tailors to your agegreoup and lifestyle where early detection is fundamental. Early detection can improve the quality of health and life. It is recommended to determine the health risks that may develop over time including chronic diseases - high blood pressure, cholesterol and diabetes. 
    For ladies, a choice of Ultrasound Breast, Ultrasound Pelvis and Mammogram is available and a choice of Ultrasound Prostate or Treadmill test for the men. This package includes tonometry, a screening that checks if you are at risk of glaucoma.
    "
);
$package_platinum = array(
    "age"       => "50 and above",
    "name"      => "LF Platinum",
    "details"   => "Live Fuller Platinum provides a thorough and comprehensive assessments of several aspects of your health. This package will aid and improve your health and lifestyle goals. 

    For ladies, a choice of Ultrasound Breast, Ultrasound Pelvis and Mammogram is available and a choice of Ultrasound Prostate or Treadmill for the men.This package includes a comprehensive set of tumour markers and anti nuclear antibody. 
    
    In addition, it comprises of one of the following choices -
    CT Cardiac Calcium score	: to measure the risk of developing heart disease
    CT Lung Screen		: to diagnose lung cancer at a very early stage
    HPV DNA test			: to screen for Cervical Cancer 
    MR Liver Scan			: to detect the presence of chronic liver diseases such as fatty liver
    Bone Densitometry		: to determine risk for osteoporosis
    "
);


?>

    <?php 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $age = $_POST['age'];
            $package_display = array();
            if(get_field('package', 'option')) {
               foreach(get_field('package', 'option') as $package) {
                    if($age == $package['age_group']) {
                        $package_display = $package;
                    }
                } 
            } else {
                if($age == '18 to 29') {
                    $package_display = $package_premium;
                }
                if($age == '30 to 39') {
                    $package_display = $package_gold;
                }
                if($age == '40 to 49') {
                    $package_display = $package_sapphire;
                }
                if($age == '50 and above') {
                    $package_display = $package_platinum;
                }
            }
            
    ?>    
            <div class="result">
                <progress id="file" max="100" value="100"></progress>
                <h3 class="header"><?=$package_display['name'];?></h3>
                <div class="details"><?=$package_display['details'];?></div>
                <div class="divider"></div>
                <div class="notice">For the full list of blood test and the package layout, please visit <a href="<?=$ehs_page;?>">here</a> to find out more and to <a href="<?=$book_apt;?>">book an appointment.</a></div>
            </div>

            <a class="btn btn-nav btn-reload" href="<?=$ehs_page;?>">Package Details</a>
            <a class="btn btn-nav btn-reload" href="<?=$book_apt;?>">Book an Appointment</a>
            <a class="btn btn-nav btn-reload" href="<?php echo get_permalink( get_the_ID() );?>">Reload the Quiz</a>        
    <?php        
        } else {
    ?>
        <div id="interactive-quiz">    
            <form action="" method="post">        
                <div class="question_1 question radio-toolbar" id="q1">
                <progress id="file" max="100" value="0"> </progress>
                    <p class="header"><?=$question1;?></p>
                    <div class="option">
                        <?php
                            foreach($option1 as $k => $option) {
                        ?>
                            <input type="radio" name="<?=$questioncode1?>" value="<?=$option['option']?>" id="option-<?=$option['id']?>" required>
                            <label for="option-<?=$option['id']?>" ><?=$option['option']?></label><br>
                        <?php
                            }
                        ?>
                    </div>
                    <?php if($notice1) {?><div class="notice"><?=$notice1;?></div><?php } ?>

                    <a class="btn-nav btn unclickable btn-1" onclick="click_next('q2', 'q1')">Next</a>

                    <script>
                        jQuery(document).ready(function() {
                            jQuery("input[name$='<?=$questioncode1?>']").click(function() {
                                var test = jQuery(this).val(); 
                                click_next('q2', 'q1');
                                if(test == 'Male') {
                                    jQuery('.notice_b').removeClass('hide');
                                    jQuery('.notice_a').addClass('hide');
                                }
                                if(test == 'Female') {
                                    jQuery('.notice_a').removeClass('hide');
                                    jQuery('.notice_b').addClass('hide');
                                }
                                if(test || !jQuery(".btn-1").hasClass("unclickable")) {
                                    jQuery(".btn-1").removeClass("unclickable")
                                    click_next('q2', 'q1');
                                }
                            });
                        });
                    </script>
                </div>

                <div class="question_2 question radio-toolbar hide " id="q2">
                <progress id="file" max="100" value="25"> </progress>
                    <p class="header"><?=$question2;?></p>
                    <div class="option">
                    <?php
                            foreach($option2 as $k => $option) {
                        ?>
                            <input type="radio" name="<?=$questioncode2?>" value="<?=$option['option']?>" id="option-<?=$option['id']?>" required>
                            <label for="option-<?=$option['id']?>"><?=$option['option']?></label><br>
                        <?php
                            }
                        ?>
                    </div>
                    <?php if($notice_2_a) {?><div class="notice notice_a hide"><?=$notice_2_a;?></div><?php } ?>
					<?php if($notice_2_b) {?><div class="notice notice_b hide"><?=$notice_2_b;?></div><?php } ?>
        
                    <a class="btn-nav btn " onclick="click_prev('q1', 'q2')">Prev</a>
                    <a class="btn-nav btn unclickable btn-2" onclick="click_next('q3', 'q2')">Next</a>
                            
                    <script>
                        jQuery(document).ready(function() {
                            
                            jQuery("input[name$='<?=$questioncode2?>']").click(function() {
                                var test = jQuery(this).val();
                                
                                if(test || !jQuery(".btn-2").hasClass("unclickable")) {
                                    jQuery(".btn-2").removeClass("unclickable")
                                }
                                click_next('q3', 'q2');
                            });
                            
                        });
                    </script>
                </div>

                <div class="question_3 question radio-toolbar hide " id="q3">     

                
                </div>

                <div class="question_4 question radio-toolbar hide " id="q4">
                <progress id="file" max="100" value="75"> </progress>
                    <p class="header"><?=$question4;?></p>
                    <div class="option">
                    <?php
                            foreach($option4 as $k => $option) {
                        ?>
                            <input type="radio" name="<?=$questioncode4?>" value="<?=$option['option']?>" id="option-<?=$option['id']?>" required>
                            <label for="option-<?=$option['id']?>"><?=$option['option']?></label><br>
                        <?php
                            }
                        ?>
                    </div>
                    <?php if($notice4) {?><div class="notice"><?=$notice4;?></div><?php } ?>


                    <a class="btn-nav btn" onclick="click_prev('q3', 'q4')">Prev</a>
                    <a class="btn-nav btn hide" onclick="click_next('q4', 'q4')">Next</a>
                    <input type="submit" value="Submit" class="unclickable btn-4">

                    <script>
                        jQuery(document).ready(function() {
                            jQuery("input[name$='<?=$questioncode4?>']").click(function() {
                                var test = jQuery(this).val();

                                
                                if(test || !jQuery(".btn-4").hasClass("unclickable")) {
                                    jQuery(".btn-4").removeClass("unclickable")
                                }
                            });
                        });
                    </script>
                </div>

                    
            </form>
        </div> 
        <script>
    function click_next(id, cur_id) {
        var curelement = document.getElementById(cur_id);
        var element = document.getElementById(id);
        
        if(id == 'q3') {
            var gender_age = '';
            var gender = '';
            var age = '';
            var q3_q = '';
            var q3_name = '';
			var q3_options = <?=json_encode(get_field('option_3', 'option'));?>;
            var q3_notice = '';
            jQuery('input[name$="age"]:checked').each(function() {
                age = this.value;  
            });

            jQuery('input[name$="gender"]:checked').each(function() {
                gender = this.value; 
            });
            
            gender_age = gender+' '+age;
            
            //console.log(q3_options['gender_group']);
            Object.values(q3_options).forEach(val => {
              //console.log(val['gender_age_group']+' - '+gender_age);
                if(gender_age == val['gender_age_group']) {
                        q3_q = val['option'];
                    	q3_name = val['code']; 
                        q3_notice = val['notice']; 
                }
            });
            
            
            
            html = '<progress id="file" max="100" value="50"> </progress>';
            html += '<p class="header">'+q3_q+'</p>';
            html += '<div class="option">';
            html += '    <input type="radio" name="'+q3_name+'" value="Yes" id="option-7" required=""><label for="option-7" onclick="click_next(\'q4\', \'q3\')">Yes</label><br>';
            html += '    <input type="radio" name="'+q3_name+'" value="No" id="option-8" required=""><label for="option-8" onclick="click_next(\'q4\', \'q3\')">No</label><br>';
            html += '</div>';
            html += '<div class="notice">'+q3_notice+'</div>';            
            html += '<a class="btn-nav btn" onclick="click_prev(\'q2\', \'q3\')">Prev</a> <a class="btn-nav btn unclickable btn-3" onclick="click_next(\'q4\', \'q3\')">Next</a>';
            html += '    <script>';
            html += '        jQuery(document).ready(function() {';
            html += '            jQuery("input[name$=\''+q3_name+'\']").click(function() {';
            html += '                var test = jQuery(this).val();';
            html += '                ';
            html += '                if(test || !jQuery(".btn-3").hasClass("unclickable")) {';
            html += '                    jQuery(".btn-3").removeClass("unclickable")'; 
            html += '                }';
            html += '            });';
            html += '        });';
            html += '    <\/script>';

            if(age.length==0 || gender.length==0) {
                html = '<p class="header">Please select Age/Gender.</p>';
                html += '<a class="btn-nav btn" onclick="click_prev(\'q2\', \'q3\')">Prev</a>';
                html += '    <script>';
                html += '        jQuery(document).ready(function() {';
                html += '            jQuery("input[name$=\''+q3_name+'\']").click(function() {';
                html += '                var test = jQuery(this).val();';
                html += '                ';
                html += '                if(test || !jQuery(".btn-3").hasClass("unclickable")) {';
                html += '                    jQuery(".btn-3").removeClass("unclickable")';
                html += '                }';
                html += '            });';
                html += '        });';
                html += '    <\/script>';
            }
            jQuery( "#q3" ).empty();
            jQuery( "#q3" ).prepend( html );
        }
        curelement.classList.add("hide");
        element.classList.remove("hide");
    }

    function click_prev(id, cur_id) {
        var curelement = document.getElementById(cur_id);
        var element = document.getElementById(id);
        
        curelement.classList.toggle("hide");
        element.classList.toggle("hide");
    }
</script>           
    <?php } ?>
<style>
#interactive-quiz {
   
}
progress {
    width: 100%;
    height: 30px;
}
.radio-toolbar, .radio-toolbar .option {
  margin: 10px 0;
}

.radio-toolbar .notice {
    margin-bottom: 20px;
}
.radio-toolbar input[type="radio"] {
  opacity: 0;
  position: fixed;
  width: 0;
}

.radio-toolbar label {
    display: inline-block;
    background-color: #ddd;
    padding: 10px 20px;
    font-family: sans-serif, Arial;
    font-size: 16px;
    border: 2px solid #c6c6c6;
    border-radius: 5px;
    margin: 10px 0;
    cursor: pointer;
    min-width: 150px;
    text-align: center;
}

.radio-toolbar label:hover {
    background-color: #004991e6;
    border-color: #004991;
    color: #fff;
}

.radio-toolbar input[type="radio"]:checked + label {
    background-color: #004991e6;
    border-color: #004991;
    color: #fff;
}

input[type="submit"] {
    background-color: #004991e6;
    border-color: #004991;
    color: #fff;
}

.btn-nav {
    background-color: #004991e6;
    border-color: #004991;
    color: #fff !important;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}
input[type="submit"]:hover, input[type="submit"]:active, input[type="submit"]:focus {
    background-color: #004991e6;
    border-color: #004991;
    color: #fff;
}

.unclickable {
    pointer-events: none;
    opacity: .7;
}

.result .details {
    margin: 20px 0;
}

.result .header {
    font-size: 24px;
}

.result .divider {
    width: 100%;
    height: 1px;
    background: #ccc;
}

.result .notice {
    padding: 15px 0;
    display: block;
}

.result .btn-nav {
	margin: 10px;   
}

.btn-reload {
    display: inline-block;
    margin: 5px;
}
</style>