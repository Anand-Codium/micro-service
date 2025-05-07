<?php

namespace CodiumTech\PincodeManager;

use CodiumTech\PincodeManager\Models\PincodeModel;

class PincodeManager
{
    /**
     * Get the list of pincodes based on the search criteria.
     * @author Anand H
     * @date 2025-04-27
     * @param string|null $searchedPincode The pincode to search for (optional).
     * @return \Illuminate\Database\Eloquent\Collection|array The list of pincodes.
     */
    public function getPincode($searchedPincode = null)
    {
        if ($searchedPincode) {
            return (new PincodeModel())->getPincode($searchedPincode);
        }
        return (new PincodeModel())->getPincode();
    }
}