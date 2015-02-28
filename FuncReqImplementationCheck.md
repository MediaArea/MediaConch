## Implementation Checker

The implementation checker receives the incoming data from the file added to the system to be inspected and the desired specification chosen within the Policy Checker and verifies that they match or that the file's parameters fit within the range of the policy's rule set.

The results of this check is sent to the Reporter (via the Core), which then translates the errors into the expected output.

An API call is required for this component only, for the use of batch processing.