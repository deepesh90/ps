<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Form;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    	Form::component('inputText', 'components.form.text', ['name','label', 'value'=>'','error'=>'', 'attributes'=>[]]);
    	Form::component('inputaddon', 'components.form.addon', ['name','label','fa', 'value'=>'','error'=>'', 'attributes'=>[]]);
    	Form::component('inputEmail', 'components.form.email', ['name','label', 'value'=>'','error'=>'', 'attributes'=>[]]);
    	Form::component('inputHidden', 'components.form.hidden', ['name','label', 'value'=>'','error'=>'', 'attributes'=>[]]);
    	Form::component('inputFile', 'components.form.file', ['name','label', 'value'=>'','error'=>'', 'attributes'=>[]]);
    	Form::component('inputCheck', 'components.form.checkbox', ['name','label','values', 'value'=>'','error'=>'', 'attributes'=>[]]);
    	Form::component('inputRadio', 'components.form.radio', ['name','label','values', 'value'=>'','error'=>'', 'attributes'=>[]]);
    	Form::component('inputSelect', 'components.form.select', ['name','label','values'=>[], 'selected_value'=>'','error'=>'', 'attributes'=>[]]);
    	
    	// label & Fields
    	Form::component('labelText', 'components.detail.text', ['data'=>[],'alias'=>'']);
    	 
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
