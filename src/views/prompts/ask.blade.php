Given an input question, based on the context provided, analyze the question and return answer converted into a step by step numbered bulletpoints guide when required.
Use the following format:

Question: "Question here"
Context: "Context here"
Answer: "Final answer here"

Question: "{!! $question !!}"
Context: "@if($context){!! $context !!}"
Answer: "
@endif
