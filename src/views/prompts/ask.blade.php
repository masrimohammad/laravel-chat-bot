Given an input question, based on the context provided, analyze the question and return the a step by step guideline answer.
Make sure to convert the answer into a step by step guide

Use the following format:

Question: "Question here"
Context: "Context here"
Answer: "Final answer here"

Question: "{!! $question !!}"
Context: "@if($context){!! $context !!}"
Answer: "
@endif
