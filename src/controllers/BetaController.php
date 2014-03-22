<?php

namespace Belar\Betaup;

class BetaController extends BaseController {

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function index()
    {        
        return \View::make('betaup::beta.landing');

    }

    /**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
    public function create()
    {

    }

    /**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
    public function store()
    {
        // Fetch all request data.
        $data = \Input::only('email', 'referer');
        // Build the validation constraint set.
        $rules = array(
            'email' => array('required', 'min:3', 'max:100', 'unique:beta_newsletters'),
            'referer' => array('alpha_num'),
        );
        // Create a new validator instance.
        $validator = \Validator::make($data, $rules);
        if ($validator->passes()) {

            $beta = new Beta();
            $beta->email = \Input::get('email');

            if(\Config::get('betaup::config.email_confirmation') === 'true' ) {

                $activation_code = uniqid(rand(1000, 6000), true);
                $beta->activation_code = $activation_code;

                \Mail::send('betaup::beta.email.activate', array('activation_code' => $activation_code), function($message)
                            {
                                $message->to(\Input::get('email'))->subject('Welcome!');
                            });

            }

            if(\Config::get('betaup::config.activated_by_default') === 'true' ) {

                $beta->activated = '1';
                $beta->activated_at = new \DateTime();
            }

            $beta->refer = uniqid();

            $beta->save();

            if($referer = \Input::get('referer'))
            {
                \Betaup::karmaUp($referer, '1');
            }

            return \Redirect::to(\Config::get('betaup::config.uri'))->with('global_success', 'You have been signed up successfuly!');
        }
        return \Redirect::to(\Config::get('betaup::config.uri'))->withInput()->withErrors($validator)->with('message', 'Validation Errors!');
    }

    /**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function show($id)
    {
        //
    }

    /**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function edit($id)
    {
        //
    }

    /**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function update($id)
    {
        //
    }

    /**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function destroy($id)
    {
        //
    }

    public function activateBeta($activation_code)
    {
        $active = Beta::where('activation_code', '=', $activation_code)->first();	

        if ($active)
        {

            $active->activated = '1';
            $active->activated_at = new \DateTime();
            $active->activation_code = '';
            $active->save();

            \Betaup::karmaUp($active->id,'1');

            return \Redirect::to(\Config::get('betaup::config.uri'))->with('global_success', 'Activation successful'); 
        }
        return \Redirect::to(\Config::get('betaup::config.uri'))->with('global_error', 'Activation failed.');
    }


    public function massMail()
    {
        return \View::make('betaup::beta.mass_mail');
    }

    public function massMailAction()
    {
        $data = \Input::only('subject', 'email_message', 'active', 'inactive', 'all' );

        $rules = array(
            'subject' => 'required',
            'email_message' => 'required',
            'acive' => 'integer',
            'inactive' => 'integer',
        );

        $validator = \Validator::make($data, $rules);

        if ($validator->passes()) {

            if(\Input::get('active') == true){
                \Mail::queueOn('betaup-mass-mail', 'betaup::beta.email.massmail',  array('email_message' => \Input::get('email_message')), function($message)
                               {
                                   $beta_users = Beta::where('activated', '=', true)->lists('email');
                                   $message->bcc($beta_users)->subject(\Input::get('subject'));
                               });
            }
            else if(\Input::get('inactive') == true){
                \Mail::queueOn('betaup-mass-mail', 'betaup::beta.email.massmail',  array('email_message' => \Input::get('email_message')), function($message)
                               {
                                   $beta_users = Beta::where('activated', '=', false)->lists('email');
                                   $message->bcc($beta_users)->subject(\Input::get('subject'));
                               });
            }
            else if(\Input::get('active') == true && \Input::get('inactive') == true){
                \Mail::queueOn('betaup-mass-mail', 'betaup::beta.email.massmail',  array('email_message' => \Input::get('email_message')), function($message)
                               {
                                   $beta_users = Beta::all()->lists('email');
                                   $message->bcc($beta_users)->subject(\Input::get('subject'));
                               });
            }

            return \Redirect::to(\Config::get('betaup::config.uri').'/massmail')->with('global_success', 'Messages have been scheduled.');        
        };

        return \Redirect::to(\Config::get('betaup::config.uri').'/massmail')->withInput()->withErrors($validator)->with('message', 'Validation Errors!');
    }

}