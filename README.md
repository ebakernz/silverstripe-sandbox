# Skeletor
PS/digital's recipe for SilverStripe 4 projects. Contains frequently used modules, templates, config settings, JavaScript and CSS.


## Helpful commands
To regenerate public files/resources folder run `composer vendor-expose`


## Functionality
Describe any noteworthy pieces of functionality specific to this project. Such as:

For email send functionality, the `From` email address can be set globally in the `.env` file, like so:

`SS_SEND_ALL_EMAILS_FROM="email@goes.here"`

This setting will be retrieved by the `EmailFrom()` method in `SiteConfigExtension` (defaults to `noreply@plasticstudio.co` if not set).

## Automated Testing
There are some basic tests (php unit and Behat) set up in Skeletor as a starting point for adding your own tests as functionality is developed.

**If you update or remove any of the methods covered by tests, you need to also update or remove the corresponding test.**

### Unit Tests
The basic unit tests for this project can be found in:

`app/tests/php`

There are unit tests covering the following methods within the `Page` class:
* `$Page->MyController()` (covered by `testMyController()`)
* `$Page->PageType()` (covered by `testPageType()`)
* `$Page->PageLink()` (covered by `testPageLink()`)
* `$Page->Inherited()` (covered by `testInherited()`)
* `$Page->GetLogoFromSiteConfig()` (covered by `testGetLogoFromSiteConfig()`)

The following unit tests cover the `ContactPage` class:
* `testViewContactPage()` (test the page eis viewable)
* `testContactForm()` (test the form is accessible, basica validation working and submitting correctly)

### Behavioural Tests (Behat)
The basic Behat tests for this project can be found in:

`app/tests/behat/features/ContactForm.feature`

These tests cover accessing, populating and submission of the `ContactPage` form.
Configuration for Behat tests is defined in `behat.yml` (in project root)

## DebugBar
`LeKoala\DebugBar\DebugBar` is installed. It can be disabled in the following ways:
- in the env (`DEBUGBAR_DISABLE=true`)
- in configiration yml (`LeKoala\DebugBar\DebugBar disabled: true`)

If the debugbar is not rendering in your local env, you may need to disable the check for local ip. This can be done in config:
- `LeKoala\DebugBar\DebugBar check_local_ip: false`


## Key Integrations
Such as integrations with a third party via API, upstream or downstream dependencies, etc.


## Critical Areas
Critical parts of the project, either from a codebase or business perspective (or both).
These are areas of the project that *should* be checked/tested any time a release is deployed.
This could be a detailed release/go-live checklist.


## Major Changes
### eg, deprecated stuff etc
For example "We've removed DMS from the composer file and added it to the project in order to address the Object issue in php7.3, seeing as the plugin cannot be upgraded without significant structural changes."


## Cron Tasks
List any cron tasks that run in the background of this project. These can often get forgotten, especially during migrations between environments.
- NB: If your project uses Queued Jobs in any way (eg with embargo or DMS), add a cron job to the server to run dev/tasks/ProcessJobQueueTask to complete jobs.


# Helpful code Gist

- Basic JQuery Accordion
https://gist.github.com/josephlewisnz/85d632b6d251b243d05b70da32cea094
https://snippets.cacher.io/snippet/66cf1ce1e465c1e40e4a

