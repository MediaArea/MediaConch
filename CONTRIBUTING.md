# Contribution Guide

## Rules for contributing code

MediaArea welcomes and encourages open source contributions to the software throughout the development stage. To participate and further the MediaConch project as it develops, contributions and additions can be made to the code and/or documentation residing within the project’s Github repository. Contributions and commits should be directed to Github and written in Qt as a branch submitted as a pull request. Individual commits should be created for each change and alteration made to the relevant file or code. All contributions should be clear, concise, and follow the standardized, applicable coding and naming conventions within the project’s style guidelines.

Contributions of code and/or additions to MediaArea’s PREFORMA project documentation must be written as follows:
```
Create your feature branch (git checkout -b my-new-feature)
Commit your changes (git commit -am 'adds some feature')
Push to the branch (git push origin my-new-feature)
Create a new Pull Request with a more verbose description of the proposed changes
```

## Rules for contributing feedback

The MediaArea project team welcomes contributions and feedback from contributing and/or interested institutions and individuals via issue tracking, various open source communication and social media channels, and other sources of public community outreach.
Open source feedback and participation of all kinds and from any interested party or institution is encouraged and can be made through opening an issue on GitHub or contacting the team directly at info@mediaarea.net.


### File Naming Conventions

All project files related to documentation regarding the PREFORMA project will be named using CamelCase. Project documentation’s actual sample data will be shared using the snake_case. These objects should carry a suitably descriptive file name that elaborates on the contents of the file and follow the standard practices and expectations of their corresponding naming conventions and specifications. File naming conventions and rules will be upheld in order to implement an efficient database of document and file releases within the open source community.

In regards to the required conventions for commit messages on the open source platform, all messages should be concise and clear and effectively summarize each contribution to the project. If more than one substantial change was made, users should not create one commit message to cover all feedback and changes. New individual commits should be made to cover each individual change made to the relevant file being altered. Effective commit messages, covering context of a change, will enable MediaArea to work within a speedier, more efficient review process and better alter development around this feedback.


### Rules for Qt/C++ code

MediaArea’s open source project will be programmed in C++ and will use the Qt application framework.

Guideline for Qt is as follows:

MediaArea will follow the applicable rules for programming within the Qt cross-platform application development framework.

Attention to detail will be given to the following rules/guidelines:

Indentation:

- Four spaces to should be given for indentation (not tabs)

Variables:

- Each variable should be declared on separate lines, only at the moment they are needed
- Avoid short names, abbreviations and single character names (only used for counters and temporaries)
- Follow the case conventions for naming

Whitespaces:

- Use only one blank line and use when grouping statements as suited. Do not put multiple statements onto one line.
- Also use a new line for the body of a control flow statement
- Follow the specific single space conventions when needed

Braces:

- Attached braces should be used (follow guidelines for rules and exceptions)
- Curly braces are used only when the body of a conditional statement contains 1+ line or when body of a conditional statement is empty (follow guidelines for rules and exceptions)

Parenthesis:

- Parenthesis should be used to group expressions

Switch Statements and Jump Statements:

- Case labels are in the same column as the switch
- Each case should have a break statement at the end or a comment to indicate there is no intentional break
- Do not use ‘else’ at the end of Jump Statements unless for symmetry purposes

Line Breaks:

- Lines should kept under 100 characters
- Wrap text if necessary
- Use commas at the end of wrapped text and operators at the beginning of new lines

Exceptions:

- Always try to achieve functional, consistent and readable code. When code does not look good, exceptions to the rules may pertain to fixing this situation.

For more specific rules, examples, exceptions and guidelines, please refer to the Qt Coding Style guide: http://qt-project.org/wiki/Qt_Coding_Style

### Guidelines for C++ code is as follows:

Manageability and productivity within the C++ coding atmosphere will be preserved by upholding to the Style and Consistency rules necessary for creating a readable and controlled code base. Attention to detail will be given to the rules governing the creation of a workable open source code in the following areas:

- Headers
- Scoping
- Classes
- Naming
- Comments
- Formatting
- Specific Features/Abilities of C++
- Relevant Exceptions

For a detailed account of specific rules, examples and guidelines for each section, please refer to the Google guide on C++: http://google-styleguide.googlecode.com/svn/trunk/cppguide.html
