2016-01-18



Problem
-----------

as a tim service provider, I want my clients to be able to:

- plug and play my services
- configure my services from their application (I don't want to force them to read my code or open my service files)

I want it to be easy for them to use my services, which means
they can just install the service, and it should be ready to use already.

In the same time, I want them to be able to configure my services
as they want.
For instance, my tim server offers a log capability,
so I want my client to be able to plug her own log function 
into the tim server.

The client should be able to do that from her application's files,
she shouldn't have to dive into my service code, because I want it to be simple for her (and reading 
someone else's code is usually a painful operation).

So, how do I let the client inject her own log function into my service without opening my service file?

1. If I had a service container, she could just configure the service, that's the best solution I believe (or at least the one I would 
		probably use for my own projects).
		However, for some reason, the client might not use a service container now, her app might be just raw php, so I need another solution.

2. TimServerGlobal would be a static singleton.
		The client will use this from her app:
				TimServerGlobal::setLogCb( function(msg, file){
					// her code
				});
		And the TimServer would by default use this function if set.	





The opaque message
---------------------

Extending on the new functionality described above, TimServerGlobal should also be used to set the opaque message.
In fact, TimServerGlobal would allow to configure anything that's configurable, it's a handle given by the service provider,
which allows the client (service user) to configure the service without getting dirty hands.



The name of the service
---------------------------
There is still a problem with this approach so far: we can set things that apply globally to every service of our apps,
but we cannot configure two services with different options, and that's really unfortunate I believe.

Well, we can do a neat thing about it: given services a name, an user could simply specify the name of the service she targets.

TimServerGlobal::setLogCb(cb, serviceName="default");

By default, the name is default.
That would be a new feature of tim in version 1.4.0, and from this version on, service providers are encouraged to set 
a meaningful name to the services they provide.

Note: in terms of design, I don't put a getServiceName method in the TimServerInterface, as I see it more like an extra tim layer
than a real functionality.

The client should be able to use the asterisk facility to set a log function globally for instance (for all the tim services of her application).










