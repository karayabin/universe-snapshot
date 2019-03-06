<?php


namespace Ling\Jin\Exception;


/**
 *
 * @info The JinBadConfigurationException class indicates that a configuration error occurred.
 * Configuration error in this case refers to a general application problem that can be fixed by the developer
 * before the app is sent to prod.
 *
 * Throwing this exception should result in a big error message thrown in the face of the user,
 * and that's the way it's supposed to be used.
 * All problems risen by this class should be taken of BEFORE the application is sent to prod.
 * If such an exception occurs, the application SHOULD NOT TRY to recover, apart from displaying the big error message
 * to the user.
 *
 *
 *
 * This includes the following cases:
 * - controller not returning an http response
 * - the page defined by a route doesn't reference an existing file
 *
 */
class JinBadConfigurationException extends JinException
{

}