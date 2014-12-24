# Style Guide
--
# Source Code Guide

## Portability

Source code MUST be built for portability between technical deployment platforms. (platform independent)

## Modularity

Source code MUST be built in a modular fashion for improved maintainability.

## Deployment

The Conformance Checker MUST allow for deployment in the five infrastructures/environments defined in the Challenge Brief.

## API's

The Conformance Checker MUST interface with other software systems via API’s. 

# Open Source Practices

## Development

Development of software in open source projects in PREFORMA MUST utilise effective open source work practices. Effective open source work practices include:
      use of nightly builds, use of an open platform for open development (e.g. Github),
      use of software configuration management systems (e.g. Git),

## Platform

All development of software in PREFORMA MUST be conducted and provided in open source projects at open development platforms (e.g. GitHub, or equivalent).
All development of digital assets (related to developed open source software) in PREFORMA MUST be provided at open development platforms (e.g. GitHub, or equivalent).

# Contribution Guide

## File Naming Conventions

Files related to documentation should be named in CamelCase. Sample data should be added in snake_case with a sufficiently descriptive title.

Commit messages should concisely summarize the contribution. Commits should be cohesive and only include changes to relevant files (e.g. do not fix a typo in the Style Guide, change scope paramaters, and fix a bug all in the same commit).

## Rules for Qt/C++ code:

4 spaces are used for indentation. Tabs are never used.

For more guidelines, refer to the Qt Coding Style guide: http://qt-project.org/wiki/Qt_Coding_Style
For even more guidelines, Google guide on C++: http://google-styleguide.googlecode.com/svn/trunk/cppguide.html

## Rules for contributing code

Contributions of code or additions to documentation must be written with Qt and must be made in the form of a branch submitted as a pull request. 

  1.  Fork this repository (https://github.com/MediaArea/PreFormaMediaInfo/fork)
  2.  Create your feature branch (`git checkout -b my-new-feature`)
  3.  Commit your changes (`git commit -am 'Added some feature'`)
  4.  Push to the branch (`git push origin my-new-feature`)
  5.  Create a new Pull Request with a more verbose description of the proposed changes

## Rules for contributing feedback

Feedback of all kind is encouraged and can either be made through [opening an issue](https://github.com/MediaArea/PreFormaMediaInfo/issues) or by contacting the team directly at info@mediaarea.net

## Linking

In order to facilitate self-description, intuitive discovery, and use of resulting code and documentation it is highly encouraged to utilize linking through documentation, tickets, commit messages, and within the code. For instance the registry itemizes individual conformance checks should link to code blocks and/or commits as software is developed that is associated to that conformance check. In this manner it should be feasible to easily review both human-readable descriptions of conformity checks and associated programmatic implementations.
