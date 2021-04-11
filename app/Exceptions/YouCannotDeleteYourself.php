<?php

namespace App\Exceptions;

use Exception;

class YouCannotDeleteYourself extends Exception
{
    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        $request->session()->flash('error', __('You cannot delete yourself. Please ask another admin to delete you.'));
        return redirect()->back();
    }
}
