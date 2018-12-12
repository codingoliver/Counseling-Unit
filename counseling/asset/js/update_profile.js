/**
 * Gate to enter for profile update
 *
 * @type {boolean}
 */
var isUpdateProfileGateOpened = false;

/**
 * Updates the profile information
 *
 * @return boolean true to proceed to update profile
 */
function enterProfileGate()
{
    if(!isUpdateProfileGateOpened) {
        swal({
                title: "Sure?",
                text: "Are you sure you want to update your profile?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes",
                closeOnConfirm: false
            }, function () {
                 isUpdateProfileGateOpened = true; // open gate to proceed to profile update
                $('#btnUpdateProfile').click();
                isUpdateProfileGateOpened = false; // close gate to proceed to profile update after entering
            }
        );
    }

    return isUpdateProfileGateOpened;
}