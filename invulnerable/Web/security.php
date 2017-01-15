<?php
    require('db.php');
    function isValidUsername($user) {
        if (preg_match('`[<]`', $user)) {
            return false;
        }
        if (preg_match('`[>]`', $user)) {
            return false;
        }
        if (sanitiseInput($user) != $user) {
            return false;
        }
        return true;
    }

    function sanitiseInput($input) {
		$rinput = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
		$rinput = stripslashes($rinput);
		return $rinput;
	}

	function sanitiseQuery($con, $query) {
		$rquery = mysqli_real_escape_string($con,$query);
		return $rquery;
	}

    function sanitiseQueryOr($con, $query) {
        $rquery = sanitiseQuery($con,$query);
        str_replace(' or ', '', $query);
        str_replace(' Or ', '', $query);
        str_replace(' OR ', '', $query);
        return $rquery;
    }

    function sanitiseQueryAnd($con, $query) {
        $rquery = sanitiseQuery($con,$query);
        str_replace(' and ', '', $query);
        str_replace(' And ', '', $query);
        str_replace(' AND ', '', $query);
        return $rquery;
    }
?>