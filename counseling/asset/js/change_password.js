/**
 * Changes the current password to the given new password
 *
 * @param typeOfProfile the type of profile [student_profile, admin_profile, counselor_profile]
 * @return boolean false to stop auto redirection to php file
 */
function changePassword(typeOfProfile)
{
    clearErrorDisplayDiv();

    var currentPassword = $('#txtCurrentPassword').val().trim();
    var newPassword = $('#txtNewPassword').val().trim();
    var confirmNewPassword = $('#txtConfirmNewPassword').val().trim();
    var errorDisplayDiv = $('#divError');

    if(newPassword !== confirmNewPassword) {
        errorDisplayDiv.html('<p style="color: red">New Password mismatch</p>');
    } else {
        $.post(controller_url + 'change_password', {
                currentPassword: currentPassword,
                newPassword: newPassword
            },
            function(data, status) {

                if(data !== 'success') {
                    errorDisplayDiv.html('<p style="color: red">Invalid current password</p>');
                    currentPassword.focus();
                } else {
                   swal('Success!', 'Password changed successfully', 'success');
                   window.location = controller_url + typeOfProfile; // refresh the page to show changes
                }
            }
        );

    }

    return false;
}

/**
 * Clears the div element for displaying errors
 *
 */
function clearErrorDisplayDiv()
{
    $('#divError').html('');
}