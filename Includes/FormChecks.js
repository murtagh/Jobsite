function checkUserLogin(form) {
  var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9_\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

  if (form.useremail.value == "") {
    alert("Please insert an EMAIL.");

    form.useremail.focus();

    return false;
  } else if (!filter.test(form.useremail.value)) {
    alert("Please insert a valid EMAIL. (e.g. user@domain.ext)");
    
    form.useremail.focus();

    return false;
  } else if (form.userpassword.value == "") {
    alert("Please insert a PASSWORD.");

    form.userpassword.focus();

    return false;
  }

  return true;
}

function checkEmpLogin(form) {
  var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9_\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

  if (form.employemail.value == "") {
    alert("Please insert an EMAIL.");

    form.employemail.focus();

    return false;
  } else if (!filter.test(form.employemail.value)) {
    alert("Please insert a valid EMAIL. (e.g. user@domain.ext)");
    
    form.employemail.focus();

    return false;
  } else if (form.employpassword.value == "") {
    alert("Please insert a PASSWORD.");

    form.employpassword.focus();

    return false;
  }

  return true;
}

function checkUserRegForm(form){
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9_\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    
  if (form.useremail.value == "") {
    alert("Please insert an EMAIL.");

    form.useremail.focus();

    return false;
  } else if (!filter.test(form.useremail.value)) {
    alert("Please insert a valid EMAIL (e.g. user@domain.ext)");
    
    form.useremail.focus();

    return false;
  } else if (form.password1.value == "") {
    alert("Please insert a PASSWORD.");

    form.password1.focus();

    return false;
  }  else if (form.password1.value.length < 6) {
    alert("Password must contain at least six characters");

    form.password1.focus();

    return false;
  } else if (form.password2.value == "") {
    alert("Please retype the PASSWORD.");

    form.password2.focus();

    return false;
  } else if (form.password1.value != form.password2.value) {
    alert("Password and confirmed password do not match");
    
    form.password1.value = "";
    form.password2.value = "";
    
    form.password1.focus();

    return false;
  } else if (form.fullname.value == "") {
      alert("Please insert your full name")
      
      form.fullname.focus();
      
      return false;
  } else if (form.county.value == "Select county") {
      alert("Please choose a location")
      
      form.county.focus();
      
      return false
  } else if (form.JobTitle.value == "") {
      alert("Please enter a job title")
      
      form.JobTitle.focus();
      
      return false
  } else if (form.availability.value == "Select availability") {
      alert("Please choose an availability status")
      
      form.availability.focus();
      
      return false
  } else if (form.CareerLevel.value == "Select career level") {
      alert("Please choose your career level")
      
      form.CareerLevel.focus();
      
      return false
  } else if (form.ExperienceYears.value == "Select years of professional experience") {
      alert("Please choose years of experience")
      
      form.ExperienceYears.focus();
      
      return false
  } else if (form.EducationLevel.value == "Select education level") {
      alert("Please choose your education level")
      
      form.EducationLevel.focus();
      
      return false
  } else if (form.relocate.value == "Please Select") {
      alert("Please advise if willing to relocate")
      
      form.relocate.focus();
      
      return false
  } else if (form.travel.value == "Please Select") {
      alert("Please advise if willing to travel")
      
      form.travel.focus();
      
      return false
  } else if (form.CVtextarea.value == "") {
      alert("Please enter your CV details")
      
      form.CVtextarea.focus();
      
      return false
  }
  return true;
}  

function checkEditProfile(form){
    if (form.Name.value == "") {
      alert("Please insert your full name")
      
      form.Name.focus();
      
      return false;
  } else if (form.JobTitle.value == "") {
      alert("Please enter a job title")
      
      form.JobTitle.focus();
      
      return false
  } else if (form.CVtextarea.value == "") {
      alert("Please enter your CV details")
      
      form.CVtextarea.focus();
      
      return false
  }
  return true;
} 

function checkEmpRegForm(form){
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9_\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    
  if (form.email_employer.value == "") {
    alert("Please insert an EMAIL.");

    form.email_employer.focus();

    return false;
  } else if (!filter.test(form.email_employer.value)) {
    alert("Please insert a valid EMAIL (e.g. user@domain.ext)");
    
    form.email_employer.focus();

    return false;
  } else if (form.password_employer.value == "") {
    alert("Please insert a PASSWORD.");

    form.password_employer.focus();

    return false;
  }  else if (form.password_employer.value.length < 6) {
    alert("Password must contain at least six characters");

    form.password_employer.focus();

    return false;
  } else if (form.password_employer2.value == "") {
    alert("Please retype the PASSWORD.");

    form.password_employer2.focus();

    return false;
  } else if (form.password_employer.value != form.password_employer2.value) {
    alert("Password and confirmed password do not match");
    
    form.password_employer.value = "";
    form.password_employer2.value = "";
    
    form.password_employer.focus();

    return false;
  } else if (form.Company_Name.value == "") {
      alert("Please insert company name")
      
      form.Company_Name.focus();
      
      return false;
  } else if (form.CompAddress1.value == "Address 1") {
      alert("Please enter a address 1")
      
      form.CompAddress1.focus();
      
      return false
  } else if (form.CityTown.value == "Enter City or Town") {
      alert("Please enter a city or town")
      
      form.CityTown.focus();
      
      return false
  } else if (form.CompCounty.value == "Select county") {
      alert("Please select a county")
      
      form.CompCounty.focus();
      
      return false
  } else if (form.CompanyTel.value == "") {
      alert("Please enter a contact number")
      
      form.CompanyTel.focus();
      
      return false
  } else if (form.Comp_Description.value == "") {
      alert("Please enter a brief description of your company")
      
      form.Comp_Description.focus();
      
      return false
  }
  
  return true;
}

function checkEditEmpProfile(form){
    if (form.Company_Name.value == "") {
      alert("Please enter a company name")
      
      form.Company_Name.focus();
      
      return false;
  } else if (form.CompAddress1.value == "") {
      alert("Please enter Address 1")
      
      form.CompAddress1.focus();
      
      return false
  } else if (form.CityTown.value == "") {
      alert("Please enter a city or town")
      
      form.CityTown.focus();
      
      return false
  } else if (form.CompCounty.value == "") {
      alert("Please enter a brief description of your company")
      
      form.CompCounty.focus();
      
      return false
  } else if (form.CompanyTel.value == "") {
      alert("Please enter a contact number")
      
      form.CompanyTel.focus();
      
      return false
  }
  return true;
} 