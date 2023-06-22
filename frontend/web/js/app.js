/**
 *  @author Eugene Terentev <eugene@terentev.net>
 */
//console.log(1);
function loadAdmiappData(){
    if($('.application-detail-form').length == 1){
        $('#applicationdetail-title').val("Mr");
        $('#applicationdetail-forename').val("Forname...");
        $('#applicationdetail-surname').val("Surname");
        $('#i1').trigger('click');
        $('#applicationdetail-date_of_birth').val("03.02.1984");
        $('#applicationdetail-nationality').val("nationality");
        $('#applicationdetail-ethnicity').val(1)
        $('#applicationdetail-religon').val(0)
        $('#i0').trigger('click');
        $('#i3').trigger('click');
        $('#i5').trigger('click');
        $('#i8').trigger('click');
        $('#i10').trigger('click');
        
        $('#applicationdetail-ethnicity').val(10)
        $('#applicationdetail-religon').val(12)
        
        
//        $('#i25').trigger('click');
        $('#applicationdetail-city').val("hyderabad");
        $('#applicationdetail-phone').val("03331234567");
        $('#applicationdetail-email').val("email@gmal.co");
        
        $('#applicationeducation-0-institute').val("My Institute");
        $('#applicationeducation-0-course_of_study').val("Course");
        $('#applicationeducation-0-language_of_instruction').val("english");
        $('#applicationeducation-0-completed').val("yes");
        $('#applicationeducation-0-date_completed').val("01.01.2020");
        
        $('#applicationeducation-1-institute').val("My First Institute");
        $('#applicationeducation-1-course_of_study').val("Course");
        $('#applicationeducation-1-language_of_instruction').val("english");
        $('#applicationeducation-1-completed').val("yes");
        $('#applicationeducation-1-date_completed').val("01.01.2021");
        
        $('#applicationworkexperience-0-start_date').val("03.01.2019");
        $('#applicationworkexperience-0-end_date').val("02.01.2020");
        $('#applicationworkexperience-0-position').val("Application Developer");
        $('#applicationworkexperience-0-employer').val("TK tech");
        $('#applicationworkexperience-0-responsiblities').val("Development and management of software applications");
        $('#applicationworkexperience-0-details').val("Proposals, design digrams, programming, database and relevant stuff");
       
        $('#applicationworkexperience-1-start_date').val("03.01.2020");
        $('#applicationworkexperience-1-end_date').val("02.01.2021");
        $('#applicationworkexperience-1-position').val("Application Analyst");
        $('#applicationworkexperience-1-employer').val("TK tech One");
        $('#applicationworkexperience-1-responsiblities').val("Development and management of software applications");
        $('#applicationworkexperience-1-details').val("Proposals, design digrams, programming, database and relevant stuff");
        
        $('#applicationreferees-0-name').val("Refree Zero");
        $('#applicationreferees-0-relationship').val("Uncle in law");
        $('#applicationreferees-0-email').val("abcd@test.com");
        $('#applicationreferees-0-phone').val("0212345-7");
        $('#applicationreferees-0-address').val("South City, Sindh Pakistan");
        
        $('#applicationreferees-1-name').val("Refree Zero");
        $('#applicationreferees-1-relationship').val("Uncle in law");
        $('#applicationreferees-1-email').val("abcd@test.com");
        $('#applicationreferees-1-phone').val("0212345-7");
        $('#applicationreferees-1-address').val("South City, Sindh Pakistan");
        

        $('#applicationdetail-english_qualification_type').val("yes");
        $('#applicationdetail-english_test_date').val("01.01.2021");
        $('#applicationdetail-english_test_centre').val("ABC");
        $('#applicationdetail-english_reading_score').val("10");
        $('#applicationdetail-english_writing_score').val("10");
        $('#applicationdetail-english_speaking_score').val("yes");
        $('#applicationdetail-english_listening_score').val("yes");
        
        
        $('#applicationdetail-personal_statement').val("My Personal Statement");

//        $('#applicationdetail-proposed_programme').val("Proposed Prog");
        $('#i12').trigger('click');;



    }
}

$('.ct-reset').click(function(){ console.log('c'); $('.ct').removeClass('bg-ct-selected'); $('.bg-ct').removeClass('d-none'); $('.fa-check').remove() })

$('.ct').click(function(){
    console.log($(this).data('coursetype'));
    $('.coursetype-col').addClass('d-none');
    $('.course-'+$(this).data('coursetype')).removeClass('d-none');
    $('.ct').removeClass('text-white'); $('.bg-ct').addClass('d-none');
    $(this).addClass('text-white bg-ct-selected').parent().removeClass('d-none');
    $('.ct-reset').removeClass('d-none')
    $('.application-form').addClass('d-none')
    
    var scrollDiv = document.getElementById("courseList"+$(this).data('coursetype')).offsetTop;
        window.scrollTo({ top: scrollDiv+15, behavior: 'smooth'});
    })

$('.course-box').click(function(){
    console.log("course clicked"+  $(this).data('courseid'));
    $('.course-box').removeClass('text-white'); $('.fa-check').remove();
    $(this).addClass('text-white').prepend('<i class="fa fa-check "></i>');
    
    $('#applicationdetail-proposed_programme').val($(this).data('courseid'))
    $('.application-form').removeClass('d-none')
    $('#collapsePersonal').addClass('show');
    $('#courseDetails').addClass('show');
    
//    var scrollDiv = document.getElementById("applicationdetail-title").offsetTop;
        window.scrollTo({ top:530, behavior: 'smooth'});
})

 $('.module-checkbox').click(function(){
     $('.core-error').addClass('d-none');
	if($(this).attr('data')== 'core') {
//            alert("You can not un check a core module"); 
            $('.core-error').removeClass('d-none');
            return false;}
        countCredits();
        $(this).parent('tr').addClass('bg bg-success')
       
})
if($('.module-checkbox').length > 0) countCredits();
function countCredits(){
    
     var mcount= 0;
	$.each($('.module-checkbox'), function(i,v){

	if($(this).is(':checked') ){
		console.log($(this).val()+ ">>"+ mcount);
				 mcount = mcount+parseInt($(this).attr('data-credits')); 
		}
	})
	$('.total-credits').html(mcount);
}