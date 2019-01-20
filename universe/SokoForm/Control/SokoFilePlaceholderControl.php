<?php


namespace SokoForm\Control;

/**
 * The idea with this control is that you have two controls:
 *
 * - a main ajax upload control (not this control),
 *          responsible for uploading the file via HTTP using a webservice
 * - a placeholder control (this control)
 *          will display the uploaded file name, so that
 *          the user knows whether or not a file has already been uploaded.
 *          Also, it can be used to compensate the lack of persistence
 *          of the regular/classical static html file upload control.
 *
 *          However, the javascript is left to the renderer.
 *          I suggest that the rendererof this placeholder control provides an api
 *          for the main ajax control to use whenever the file is successfully uploaded.
 *
 *
 */
class SokoFilePlaceholderControl extends SokoControl
{

}