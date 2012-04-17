<?php
class Controller_Images extends Controller_Template 
{

	public function action_index()
	{
		$data['images'] = Model_Image::find('all');
		$this->template->title = "Images";
		$this->template->content = View::forge('images/index', $data);

	}

	public function action_view($id = null)
	{
		$data['image'] = Model_Image::find($id);

		$this->template->title = "Image";
		$this->template->content = View::forge('images/view', $data);

	}

	public function action_create($id = null)
	{
		if (Input::method() == 'POST')
		{



            // Custom configuration for this upload
            $config = array(
                'path' => DOCROOT.'uploads',
                'randomize' => true,
                'ext_whitelist' => array('img', 'jpg', 'jpeg', 'gif', 'png'),
            );




            // process the uploaded files in $_FILES
            Upload::process($config);



            // if there are any valid files
            if (Upload::is_valid())
            {


                // save them according to the config
                Upload::save();




                // get the list of successfully uploaded files
                foreach( Upload::get_files() as $file )
                {


                    //Debug::dump($file);


                    $val = Model_Image::validate('create');

                                if ($val->run())
                                {
                                    $image = Model_Image::forge(array(
                                        'caption' => Input::post('caption'),
                                        'filepath' => $file['saved_as'],
                                        'description' => Input::post('description'),
                                        'filter' => Input::post('filter'),
                                    ));

                                    if ($image and $image->save())
                                    {
                                        Session::set_flash('success', 'Added image #'.$image->id.'.');

                                        Response::redirect('images');
                                    }

                                    else
                                    {
                                        Session::set_flash('error', 'Could not save image.');
                                    }
                                }
                                else
                                {
                                    Session::set_flash('error', $val->show_errors());
                                }
            }


                // call a model method to update the database
                //Model_Uploads::add(Upload::get_files());
            }

            // and process any errors
            foreach (Upload::get_errors() as $file)
            {
                // $file is an array with all file information,
                // $file['errors'] contains an array of all error occurred
                // each array element is an an array containing 'error' and 'message'
            }






		}

		$this->template->title = "Images";
		$this->template->content = View::forge('images/create');

	}

	public function action_edit($id = null)
	{
		$image = Model_Image::find($id);
		$val = Model_Image::validate('edit');

		if ($val->run())
		{
			$image->caption = Input::post('caption');
			$image->filepath = Input::post('filepath');
			$image->description = Input::post('description');

			if ($image->save())
			{
				Session::set_flash('success', 'Updated image #' . $id);

				Response::redirect('images');
			}

			else
			{
				Session::set_flash('error', 'Could not update image #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$image->caption = $val->validated('caption');
				$image->filepath = $val->validated('filepath');
				$image->description = $val->validated('description');

				Session::set_flash('error', $val->show_errors());
			}
			
			$this->template->set_global('image', $image, false);
		}

		$this->template->title = "Images";
		$this->template->content = View::forge('images/edit');

	}

	public function action_delete($id = null)
	{
		if ($image = Model_Image::find($id))
		{
			$image->delete();

			Session::set_flash('success', 'Deleted image #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete image #'.$id);
		}

		Response::redirect('images');

	}


}