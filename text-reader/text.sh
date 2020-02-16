#!/bin/bash

#Change the deliminator of linux to be fullstop.
IFS='.'

#Read the input and store as array of sentences.
read -ra sentences

#Re-process the text so it's in an array of words, changing deliminator to spaces and fullstops.
IFS=' |.'
read -ra words <<< ${sentences[@]}

#Change the deliminator back to linnux default.
IFS=' '

num_of_words="${#words[@]}"
num_of_sentences="${#sentences[@]}"

#Create an array of alphabetically sorted words.
IFS='\n'
sorted_words=$(echo ${words[@]} | tr " " "\n" | sort)
IFS=' '

longest_word_size=0
declare -A dict_of_words
for word in "${words[@]}"; do
  if (( $longest_word_size < ${#word} )); then
    longest_word_size=${#word}
    longest_word=$word
  fi
  dict_of_words[$word]=$((${dict_of_words[$word]:=0}+1))
done

common_words=$(for word in "${!dict_of_words[@]}"; do
  printf '%s-%s\n' "$word" "${dict_of_words[$word]}"
done | sort -t - -k 2n | tail -n 6)

#echo "dict: ${dict_of_words[@]}"
#echo "${sorted_words[@]}"

echo "Num of sentences: $num_of_sentences"
echo "Num of words: $num_of_words"
echo "Longest word is '$longest_word' with '$longest_word_size' letters."
printf "The six most common words are:\n$common_words\n"
