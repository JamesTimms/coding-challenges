#!/bin/bash
read -p "How many socks?" num_of_socks
read -p "Input socks as an array of integers..." socks

sockMerchant() {
  pair_count=0
  num_of_socks=$1
  shift
  socks=("$@")
  #check for pairs, if pair found increament pair count by 1.
  for ((i = 0 ; i < $num_of_socks ; )); do
    for ((j = i + 1 ; j < $num_of_socks ; )); do
      #for a sock check for a matching sock.
      # echo "$i, $j"
      # echo "First el: ${socks[$i]}"
      # echo "$num_of_socks"
      if [[ "${socks[$i]}" == "${socks[$j]}" ]]; then
        #remove pair from array
        #(20 20 10 30 50 10 20)
        unset socks[$i]
        unset socks[$j]
        socks=("${socks[@]}")
        i=0
        j=1
        # echo "Matched"
        # echo "Post first el: ${socks[$i]}"
        num_of_socks=$(($num_of_socks - 2))
        pair_count=$(($pair_count + 1))
        # echo "${socks[@]}"
      else
        j=$((j + 1))
      fi
    done
    i=$((i + 1))
  done
  echo $pair_count
  echo "${socks[@]}"
}

#input not actually in the form of an array...
sock_arr=($socks)

sockMerchant $num_of_socks ${sock_arr[@]}
