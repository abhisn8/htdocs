<?php
// Function for gender dropdown.
function genderDropDown($gender) {
    switch ($gender) {
        case 'male':
            $opt = <<<DELIMETER
            <option value="">Choose your gender</option>
            <option value="male" selected>Male</option>
            <option value="female">Female</option>
            DELIMETER;
            break;
            
        case 'female':
            $opt = <<<DELIMETER
            <option value="">Choose your gender</option>
            <option value="male">Male</option>
            <option value="female" selected>Female</option>
            DELIMETER;
            break;
    }
    

    return <<<DELIMETER
    <select title="Gender" class="select-option settings-dropdown" name="user-gender" id="gender-select" required>
    {$opt}
    </select>
    DELIMETER;
}

// Function for job profile dropdown.
function jobProfileDropDown($jobProfile) {
    $jobs = [
        "primary teacher",
        "preschool teacher",
        "kindergarten",
        "physical education",
        "music teacher",
        "librarian",
        "middle school teacher",
        "high school teacher",
        "art teacher",
        "pre-university teacher",
        "school counsellor",
        "professor",
        "special education",
        "home-school teacher",
        "tutor",
        "other"
    ];

    $options = "";

    foreach ($jobs as $option) {
        if ($option === $jobProfile) {
            $options .= "<option value='{$option}' selected style='text-transform: capitalize;'>{$option}</option>";
        } else {
            $options .= "<option value='{$option}' style='text-transform: capitalize;'>{$option}</option>";
        }
    }

    return <<<DELIMETER
    <select class="select-option settings-dropdown" name="user-job" id="job-select" required>
        <option value="">Select your job profile</option>
        {$options}
    </select>
    DELIMETER;
}

// Function for institute type dropdown.
function instituteTypeDropDown($instituteType) {
    $types = [
        "College - Aided/Unaided",
        "Polytechnique – Govt/Pvt",
        "Engineering – Govt/Pvt",
        "Medical – Govt/Pvt",
        "Law – Govt/Pvt",
        "Management – Govt/Pvt",
        "University – Govt/Pvt",
        "Self-employed",
        "Others"
    ];

    $options = "";

    foreach ($types as $type) {
        if ($type === $instituteType) {
            $options .= "<option value='{$type}' selected>{$type}</option>";
        } else {
            $options .= "<option value='{$type}'>{$type}</option>";
        }
    }

    return <<<DELIMETER
    <select id="type-of-institute" class="select-option settings-dropdown" title="Select your state" name="institute-type">
        {$options}
    </select>
    DELIMETER;
}

// Function for state dropdown.
function stateDropDown($selectedState, $name) {
    $states = [
        "Andhra Pradesh",
        "Arunachal Pradesh",
        "Assam",
        "Bihar",
        "Chandigarh (UT)",
        "Chhattisgarh",
        "Dadra and Nagar Haveli (UT)",
        "Daman and Diu (UT)",
        "Delhi (NCT)",
        "Goa",
        "Gujarat",
        "Haryana",
        "Himachal Pradesh",
        "Jammu and Kashmir",
        "Jharkhand",
        "Karnataka",
        "Kerala",
        "Lakshadweep (UT)",
        "Madhya Pradesh",
        "Maharashtra",
        "Manipur",
        "Meghalaya",
        "Mizoram",
        "Nagaland",
        "Odisha",
        "Puducherry (UT)",
        "Punjab",
        "Rajasthan",
        "Sikkim",
        "Tamil Nadu",
        "Telangana",
        "Tripura",
        "Uttarakhand",
        "Uttar Pradesh",
        "West Bengal"
    ];

    $options = "";

    foreach ($states as $state) {
        if ($state === $selectedState) {
            $options .= "<option value='{$state}' selected>{$state}</option>";
        } else {
            $options .= "<option value='{$state}'>{$state}</option>";
        }
    }

    return <<<DELIMETER
    <select id="{$name}" class="select-option settings-dropdown" title="Select your state" name="{$name}">
        <option value="">Select your state</option>
        {$options}
    </select>
    DELIMETER;
}

// Function for district dropdown.
function districtDropDown($district, $name) {
    $options = "";

    return <<<DELIMETER
    <select id="{$name}" class="select-option" title="Select your district" name="{$name}">
        <option value="">Select your district</option>
        {$options}
    </select>
    DELIMETER;
}
?>