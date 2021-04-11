<?php

namespace App\Exceptions;

use Exception;

class AdminRoleCannotBeChangedOrRemoved extends Exception
{
        /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        $request->session()->flash('error', __('Administrator role cannot be changed or removed'));
        return redirect()->back();
    }
}
